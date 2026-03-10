<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prompt;

class PromptSeeder extends Seeder
{
    public function run(): void
    {
        $prompts = [
            ['question' => 'Apa hal terbaik yang terjadi hari ini?', 'category' => 'reflection'],
            ['question' => 'Apa yang membuatmu bersyukur hari ini?', 'category' => 'gratitude'],
            ['question' => 'Hal apa yang membuatmu tersenyum hari ini?', 'category' => 'positive'],
            ['question' => 'Apa tantangan yang kamu hadapi hari ini?', 'category' => 'reflection'],
            ['question' => 'Apa pelajaran penting yang kamu dapat hari ini?', 'category' => 'learning'],
            ['question' => 'Hal kecil apa yang membuat harimu lebih baik?', 'category' => 'positive'],
            ['question' => 'Apa yang ingin kamu perbaiki besok?', 'category' => 'growth'],
            ['question' => 'Apa hal yang kamu banggakan dari dirimu hari ini?', 'category' => 'self-love'],
            ['question' => 'Apa yang membuatmu merasa tenang hari ini?', 'category' => 'mindfulness'],
            ['question' => 'Jika hari ini bisa diulang, apa yang ingin kamu lakukan berbeda?', 'category' => 'reflection']
        ];

        foreach ($prompts as $prompt) {
            Prompt::create($prompt);
        }
    }
}