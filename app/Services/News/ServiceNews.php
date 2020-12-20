<?php

namespace App\Services\News;

use App\Models\FavoriteNews;
use App\User;
use Illuminate\Http\Client\Factory;

class ServiceNews
{
    public $newStoriesUri ;
    public $getStoriesUri ;

    public function __construct(Factory $http ,FavoriteNews $news , User $user)
    {   
        $this->http = $http;
        $this->news = $news;
        $this->newStoriesUri = env('API_HACKERNEWS_NEW_STORIES');
        $this->getStoriesUri = env('API_HACKERNEWS_STORIE');
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

    public function checkExistNewsOrCreate($validated)
    {
        $news = $this->news->firstOrCreate(['link'=>$validated['link']],
                                           ['name'=>$validated['name']]);
        
        return $news;
    }

    public function storeUserNews($validated)
    {
        $news = $this->checkExistNewsOrCreate($validated);

        $user = $this->user->where('email' , $validated['email']); ///////////////////////////////

        if($user) $news->users()->attach($user->id);
    }

    public function deleteUserNews($validated)
    {
        $news = $this->news->where([
                        ['name','=',$validated['name']],
                        ['link','=',$validated['link']]
                        ])
                      ->first();

        $user = $this->user->where('email' , $validated['email']); ///////////////////////////////
        
        if($news && $user) $news->users()->detach($user->id);
    }
}