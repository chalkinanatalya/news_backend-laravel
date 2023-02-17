<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sources')->truncate();
        DB::table('sources')->insert($this->getData());
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function getData(): array
    {
        $data = [
            [
                'title' => 'CBS Main',
                'url' => 'https://www.cbsnews.com/latest/rss/main',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS US',
                'url' => 'https://www.cbsnews.com/latest/rss/us',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS Politics',
                'url' => 'https://www.cbsnews.com/latest/rss/politics',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS World',
                'url' => 'https://www.cbsnews.com/latest/rss/world',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS Health',
                'url' => 'https://www.cbsnews.com/latest/rss/health',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS Moneywatch',
                'url' => 'https://www.cbsnews.com/latest/rss/moneywatch',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS Science',
                'url' => 'https://www.cbsnews.com/latest/rss/science',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS Technology',
                'url' => 'https://www.cbsnews.com/latest/rss/technology',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS Entertainment',
                'url' => 'https://www.cbsnews.com/latest/rss/entertainment',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ],
            [
                'title' => 'CBS News Investigates',
                'url' => 'https://www.cbsnews.com/latest/rss/evening-news/cbs-news-investigates',
                'created_at'  => \now(),
                'updated_at' => \now(),
            ]
        ];

        return $data;
    }
}
