<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;
    public function index(): View
    {
        $news = News::query()->paginate(10);
        return \view('news.index', [
			'newsList' => $news
        ]);
    }

    public function show(News $news): View
    {
        return \view('news.show', [
            'news' => $news
        ]);
    }

}
