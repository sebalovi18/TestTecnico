<?php

namespace App\Services\ServiceGetNews;

use Illuminate\Http\Client\Factory;

class ServiceGetNews
{
    public $newStoriesUri = 'https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty';
    public $getStoriesUri = 'https://hacker-news.firebaseio.com/v0/item/';

    public function __construct(Factory $http)
    {   
        $this->http = $http;
    }

    public function getNews(int $newsId)
    {
        return $this->http->get("{$this->getStoriesUri}{$newsId}.json?print=pretty")->json();
    }
    
    public function getLastTenNews()
    {
        $news = $this->http->get($this->newStoriesUri)->json();

        $lastTenNews = array_slice($news,0,10);


        $arrayOfNewsResults = [];

        foreach($lastTenNews as $news)
        {
            array_push($arrayOfNewsResults , $this->getNews($news));
        }

        return $arrayOfNewsResults;
    }
}