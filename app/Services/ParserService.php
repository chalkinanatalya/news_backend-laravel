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

    public function getParseData(): array
    {
       $xml = XmlParser::load($this->link);

       return $xml->parse([
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
    }
}
