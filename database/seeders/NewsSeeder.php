<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('news')->truncate();
        DB::table('news')->insert($this->getData());
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'author' => \fake()->userName(),
                'status' => NewsStatus::DRAFT->value,
                'description' => \fake()->text(100),
                'created_at'  => \now(),
                'updated_at' => \now()
            ];
        }

        return $data;
    }
}
