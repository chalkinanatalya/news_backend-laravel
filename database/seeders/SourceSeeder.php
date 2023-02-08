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
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => \fake()->company(),
                'url' => \fake()->url(),
                'created_at'  => \now(),
                'updated_at' => \now(),
            ];
        }

        return $data;
    }
}
