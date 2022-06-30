<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class movies extends Controller
{
    public function index()
    {
        $cache_id = URL::full();
        if (Cache::has('movies' . $cache_id) && Cache::has('movies_api' . $cache_id)) {
            $movies_raw = Cache::get('movies' . $cache_id);
            $users = Cache::get('movies_api' . $cache_id);
        } else {
            $movies = DB::table('newfastmovies')->paginate(20);

            Cache::put('movies' . $cache_id, $movies, now()->addMinutes(5));

            $api_key = "3c2fd11dc93ee3dfdcf927cc73990153";
            $users1 = [];
            $tmdb_content = [];
            $raw_content = DB::table('newfastmovies')->paginate(20);
            foreach ($raw_content as $key => $value) {
                $id = $value->movie_id;
                $response =
                    Http::get("https://api.themoviedb.org/3/movie/$id?api_key=$api_key");
                $tmdb_content[] = $response->json();
            }
            // final result
            $users1[] = $tmdb_content;
            Cache::put('movies_api' . $cache_id, $users1, now()->addMinutes(5));
            $users = Cache::get('movies_api' . $cache_id);
            $movies_raw = Cache::get('movies' . $cache_id);
        }
        // return view::make('movies', ['users' => $movies_api, 'movies' => $movies_raw]);
        return view('movies', ['users' => $users], ['movies' => $movies_raw]);
    }
}
