<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GeminiService;
use App\Models\HealthAdvice;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HealthAdviceController extends Controller {
    use ApiResponse;

    protected $gemini;

    public function __construct(GeminiService $gemini) {
        $this->gemini = $gemini;
    }

    public function generate() {
        $user = Auth::user();

        // 1. Get the names of recent symptoms (e.g., the last 5)
        $symptoms = $user->symptoms()->latest()->take(5)->pluck('name')->toArray();

        if (empty($symptoms)) {
            return $this->errorResponse("Please record symptoms before requesting advice.");
        }

        $symptomsText = implode(', ', $symptoms);

        // 2. Call the AI Service
        $adviceText = $this->gemini->getWellnessAdvice($symptomsText);
        // Log::info();
        // Log::info(["advice Text"=>$adviceText]);
        // 3. Save to history
        $advice = HealthAdvice::create([
            'user_id' => $user->id,
            'symptoms_context' => $symptomsText,
            'advice' => $adviceText,
            'generated_at' => now()
        ]);

        return $this->successResponse($advice, "Advice generated successfully.");
    }

    public function index() {
        $history = Auth::user()->healthAdvices()->latest()->get();
        return $this->successResponse($history, "AI advice history.");
    }
}
