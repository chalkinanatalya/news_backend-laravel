<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryHasNews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category_has_news')->insert($this->getData());
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function getData(): array
    {
        $data = [];
        $newsId = 1;
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $data[] = [
                    'category_id' => $i + 1,
                    'news_id' => $newsId,
                ];
                $newsId++;
            }
        }

        return $data;
    }
}
