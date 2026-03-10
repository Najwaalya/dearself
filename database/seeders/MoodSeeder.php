<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mood;

class MoodSeeder extends Seeder
{
    public function run(): void
    {
        $moods = [
            ['name' => 'Happy'],
            ['name' => 'Sad'],
            ['name' => 'Angry'],
            ['name' => 'Excited'],
            ['name' => 'Calm'],
            ['name' => 'Tired'],
            ['name' => 'Anxious']
        ];

        foreach ($moods as $mood) {
            Mood::create($mood);
        }
    }
}