<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Doctor::create([
            'name' => 'Dr. Ahmed Alami',
            'specialty' => 'Cardiologue',
            'city' => 'Casablanca',
            'years_of_experience' => 12,
            'consultation_price' => 300.00,
            'available_days' => ['Lundi', 'Mercredi', 'Vendredi'] // Hna l-Array PHP!
        ]);

        Doctor::create([
            'name' => 'Dr. Sara Mansouri',
            'specialty' => 'Généraliste',
            'city' => 'Rabat',
            'years_of_experience' => 5,
            'consultation_price' => 200.00,
            'available_days' => ['Mardi', 'Jeudi']
        ]);
        
        Doctor::create([
            'name' => 'Dr. Yassine Bennani',
            'specialty' => 'Pédiatre',
            'city' => 'Casablanca',
            'years_of_experience' => 8,
            'consultation_price' => 250.00,
            'available_days' => ['Lundi', 'Mardi', 'Mercredi']
        ]);
        
    }
}
