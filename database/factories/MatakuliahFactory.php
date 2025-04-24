<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matakuliah;
class MatakuliahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode' => 'IF' . $this->faker->unique()->numberBetween(100, 199),
            'nama' => $this->faker->words(2, true), // contoh: "Pemrograman Dasar"
            'jadwal' => $this->faker->randomElement([
                'Senin 08:00 - 10:00',
                'Selasa 10:00 - 12:00',
                'Rabu 08:00 - 10:00',
                'Kamis 10:00 - 12:00',
                'Jumat 13:00 - 15:00'
            ])
        ];
    }
}
