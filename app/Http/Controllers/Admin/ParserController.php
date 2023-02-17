<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $load = $parser->setLink("https://www.cbsnews.com/latest/rss/main")->getParseData();
        foreach ($load['news'] as $item) {
            $newsData = [
                'title' => $item['title'],
                'author' => 'admin',
                'status' => 'draft',
                'description' => $item['description'],
                'url' => $item['link'],
                'image' => $item['image'],
            ];

            News::create($newsData);
        }
        dd($load['news']);
    }
}
