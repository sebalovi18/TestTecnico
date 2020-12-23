<?php

namespace App\Services\News;

use App\Models\News;
use App\User;
use Exception;
use GuzzleHttp\Client;

class ServiceNews
{
    public $newStoriesPath;
    public $getStoriesPath;

    public function __construct(Client $http, News $news)
    {
        $this->http = $http;
        $this->news = $news;
        $this->newStoriesPath = "newstories.json?print=pretty";
        $this->getStoriesPath = "item/";
    }
    public function getNews(int $newsId)
    {

        $news = $this->http->get(
            "{$this->getStoriesPath}{$newsId}.json?print=pretty"
        );

        return json_decode($news->getBody()->getContents(), true);
    }
    public function getLastTenNews()
    {
        $response = $this->http->get($this->newStoriesPath);
        $news = json_decode($response->getBody()->getContents(), true);
        $lastTenNews = array_slice($news, 0, 10);
        $arrayOfNewsResults = [];
        foreach ($lastTenNews as $news) {
            array_push($arrayOfNewsResults, $this->getNews($news));
        }

        return $arrayOfNewsResults;
    }
    public function storeUserNews($newsId, User $user)
    {
        try {
            $this->news->create(
                [
                    'id' => $newsId['id'],
                    'user_id' => $user->id
                ]
            );
        } catch (Exception $err) {
            abort(422, "Duplicated");
        }
    }
    public function deleteUserNews($newsId, User $user)
    {
        try {
            $news = $this->news->where(
                [
                    ['id', '=', $newsId['id']],
                    ['user_id', '=', $user->id]
                ]
            );
            $news->delete();
        } catch (Exception $e) {
            abort(422, "Can't delete");
        }
    }
    public function getUserNews(User $user)
    {
        $newsUser = $user->news;
        $favouriteNews = [];
        foreach ($newsUser as $news) {
            $favouriteNews[]= $this->getNews($news->id);
        }

        return $favouriteNews;
    }
}
