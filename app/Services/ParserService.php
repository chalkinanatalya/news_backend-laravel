<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\News;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{

    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,description,guid,pubDate,image]'
            ]
        ]);

        foreach ($data['news'] as $news) {
            $newsData = [
                'title' => $news['title'],
                'author' => 'admin',
                'status' => 'draft',
                'description' => $news['description'],
                'url' => $news['link'],
                'image' => $news['image'],
            ];
            News::create($newsData);
        }
    }
}
