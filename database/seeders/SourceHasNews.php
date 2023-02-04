<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceHasNews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('source_has_news')->insert($this->getData());
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function getData(): array
    {
        $data = [];
        $newsId = 1;
        $sourceId = 1;
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'source_id' => $sourceId,
                'news_id' => $newsId,
            ];
            $newsId++;
            if ($sourceId === 20) {
                $sourceId = 1;
            } else {
                $sourceId++;
            }
        }

        return $data;
    }
}
