<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use NewsTrait;
    public function index()
    {
        return \view('categories.categories', [
            'categories' => $this->getCategory(),
        ]);
    }
}
