<?php

declare(strict_types=1);

namespace App\Http\Controllers;


trait NewsTrait
{
    public function getNews(int $id = null):array
    {
        $news = [];
        $quantityNews = 10;

        if($id == null) {
            for($i = 1; $i <= $quantityNews; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y H:i')
                ];
            }
            return $news;
        }

        return [
                'id' => $id,
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'author' => \fake()->userName(),
                'created_at' => \now()->format('d-m-Y H:i')
        ];
    }

    public function getCategory(int $id = null):array
    {
        $categories = [];
        $quantity = 7;

        if($id == null) {
            for($i = 1; $i <= $quantity; $i++) {
                $categories[$i] = [
                    'category_id' => $i,
                    'category' => \fake()->text(10),
                ];
            }
            return $categories;
        }

        return [
            'category_id' => $id,
            'category' => \fake()->text(10),
        ];
    }
}
