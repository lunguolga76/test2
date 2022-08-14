<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Exception;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


class ContentCrawlerController extends Controller
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            [
                'timeout' => 10,
                'verify' => false
            ]
        );
    }

    public function scarper()
    {
        try {
            $response = $this->client->get('https://www.bestjobs.eu/ro/locuri-de-munca-in-bucuresti/symfony');
            $content = $response->getBody()->getContents();

            $crawler = new Crawler($content);
            $_this = $this;
            $data = $crawler->filter('div.card')
                ->each(
                    function (Crawler $node, $i) use ($_this) {
                        return $_this->getNodeContent($node);
                    }
                );
                 
            $newArray = [];
            foreach ($data as $item) {
                if (!empty($item['title']) && !empty($item['company'])) {
                    $newArray[] = [
                        'title' => $item['title'],
                        'company' => $item['company'],
                        'location' => empty($item['location']) ? $item['location1'] : $item['location'],
                        'description' => $item['description']
                    ];
                }
            }
            Job::insert($newArray);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return redirect('/');
    }

    private function hasContent($node)
    {
        return $node->count() > 0;
    }

    private function getNodeContent($node): array
    {
        return [
            'title' => $this->hasContent($node->filter('.truncate-2-line strong')) != false ? $node->filter(
                '.truncate-2-line strong'
            )->text() : '',
            'company' => $this->hasContent($node->filter('.text-truncate small')) != false ? $node->filter(
                '.text-truncate small'
            )->text() : '',
            'location' => $this->hasContent($node->filter('span.stretched-link-exception a')) != false ? $node->filter(
                'span.stretched-link-exception a'
            )->text() : '',
            'location1' => $this->hasContent($node->filter('a.stretched-link-exception')) != false ? $node->filter(
                'a.stretched-link-exception'
            )->text() : '',
           'description' => $this->hasContent($node->filter('.list-card a')) != false ? $node->filter('.list-card a')->link()->geturi(): ''
        ];
    }
}

