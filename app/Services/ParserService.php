<?php

namespace App\Services;

use App\Contracts\Parser as Contract;
use Orchestra\Parser\Xml\Facade as Parser;

class ParserService implements Contract
{
    protected string $url;
    
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }
    
    public function getNews(): array
    {
        $xml = Parser::load($this->url);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'linl' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,description]'
            ]
        ]);
    }
}