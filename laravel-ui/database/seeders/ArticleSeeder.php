<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'title' => 'Kampus Merdeka Sukses',
            'content' => 'Penerapan Kampus Merdeka di PTN Sukses',
            'image' => 'kampusmerdeka.png',
            'user_id' => 1,
            'category_id' => 1,
        ]);
    }
}
