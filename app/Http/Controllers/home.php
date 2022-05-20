<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class home extends Controller
{
    public function index()
    {
        /* Cache::forget('cachekey');
        Cache::forget('seriesCache');
        Cache::forget('upcomingCache'); */
        if (Cache::has('seriesCache') && Cache::has('cachekey') && Cache::has('upcomingCache')) {
            $jsonData1 = Cache::get('cachekey');
            $series1 = Cache::get('seriesCache');
            $upcoming1 = Cache::get('upcomingCache');
        } else {
            $series = DB::select('select * from series order by a_id desc limit 8');
            // $seriesJson = json_decode($series, true);
            // upcoming
            $upcoming = Http::get("https://api.themoviedb.org/3/movie/upcoming?api_key=3c2fd11dc93ee3dfdcf927cc73990153&language=en-US&page=1");
            $upcomingJson = $upcoming->json();
            // series
            $users = DB::select('select * from newfastmovies limit 8');
            $jsonData = [];
            foreach ($users as $user) {
                $id = $user->movie_id;
                $key = "3c2fd11dc93ee3dfdcf927cc73990153";
                $response = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=$key");

                $jsonData[] = $response->json();
                /* $json = file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=$key");
                $resultjs = json_decode($json, true); */
            }
            Cache::put('cachekey', $jsonData, 100000);
            Cache::put('seriesCache', $series, 100000);
            Cache::put('upcomingCache', $upcomingJson, 100000);
            $jsonData1 = Cache::get('cachekey');
            $series1 = Cache::get('seriesCache');
            $upcoming1 = Cache::get('upcomingCache');
        }

        return view('home', ['users' => $jsonData1], ['seriesraw' => $series1], ['upcomingraw' => $upcoming1]);
    }
}
