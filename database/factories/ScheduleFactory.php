<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_id' => Subject::factory(),
            'student_id' => User::factory(),
            'hari' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'jam_mulai' => fake()->randomElement(['07:00', '08:00', '09:00', '10:00', '11:00', '12:00']),
            'jam_selesai' => fake()->randomElement(['09:00', '10:00', '11:00', '12:00', '13:00', '14:00']),
            'ruangan' => fake()->randomElement(['A1', 'A2', 'A3', 'A4', 'A5', 'A6']),
            'kode_absensi' => fake()->randomElement(['A1', 'A2', 'A3', 'A4', 'A5', 'A6']),
            'tahun_akademik' => fake()->randomElement(['2021/2022', '2022/2023', '2023/2024']),
            'semester' => fake()->randomElement(['Genap', 'Ganjil']),
            'created_by' => fake()->randomElement(['1', '2', '3']),
            'updated_by' => fake()->randomElement(['1', '2', '3']),
        ];
    }
}
