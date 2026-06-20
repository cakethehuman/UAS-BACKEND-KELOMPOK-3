<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WatchController extends Controller
{
    public function index()
    {
        $apiKey = config('services.youtube.key', env('YOUTUBE_API_KEY'));

        $searchPool = [
            'NBA Highlights 2026',
            'Top BEST Moments of the 2026 NBA Playoffs',
            'NBA "Too Smooth!" MOMENTS',
            'EVERY HIGHLIGHT From The 2026 NBA Finals',
            'NBA Best Clutches & Game Winners',
            'NBA Ultimate Ankle Breakers Compilation',
            'NBA Top 50 Plays of the Decade',
            'NBA Greatest Crossovers of All Time',
            'NBA Insane Dunks of the Season',
            'NBA Full Game Highlights Today'
        ];
        $randomKeyword = $searchPool[array_rand($searchPool)];

        $response = Http::withoutVerifying()->get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $randomKeyword,
            'type' => 'video',
            'maxResults' => 6,
            'key' => $apiKey,
        ]);

        $videos =[];

        if ($response->successful()){
            $searchResults = $response->json()['items'] ?? [];

            foreach($searchResults as $item){
                $videos[] = [
                    'video_id'=> $item['id']['videoId'],
                    'title'=> html_entity_decode($item['snippet']['title']),
                    'thumbnail'=> $item['snippet']['thumbnails']['high']['url'],
                    'youtube_url'=> 'https://www.youtube.com/watch?v=' . $item['id']['videoId'],
                    'is_live' => $item['snippet']['liveBroadcastContent'] === 'live'
                ];
            }
        } else {
            //backup video
            $videos = [
                [
                    'video_id' => 'PrObPnSeeag',
                    'title'=> 'EVERY HIGHLIGHT From The 2026 NBA Finals 🏆',
                    'thumbnail'=>'https://img.youtube.com/vi/PrObPnSeeag/maxresdefault.jpg',
                    'youtube_url'=>'https://youtu.be/PrObPnSeeag?si=tB4q6K1m_kMq_sxM',
                    'is_live' => false,
                ],
                [
                    'video_id' => 'ynSg4oYHgwE',
                    'title'=> 'THE WILDEST ENDING OF THE 2026 NBA PLAYOFFS 🤯',
                    'thumbnail'=>'https://img.youtube.com/vi/ynSg4oYHgwE/maxresdefault.jpg',
                    'youtube_url'=>'https://youtu.be/ynSg4oYHgwE?si=Lre7AmVkdInJd8ha',
                    'is_live' => false,    
                ],
                [
                    'video_id' => 'TgbhwxHXh9U',
                    'title'=> 'NBA TOP 5 Plays of the Night',
                    'thumbnail'=>'https://img.youtube.com/vi/TgbhwxHXh9U/maxresdefault.jpg',
                    'youtube_url'=>'https://youtu.be/TgbhwxHXh9U?si=6Ma1rUPdI5puHlLC',
                    'is_live' => false,  
                ],
            ];
        }   

        return view('watch.index', compact('videos'));
    }

    public function show($id){
        return view('watch.show', compact('id'));
    }
}
