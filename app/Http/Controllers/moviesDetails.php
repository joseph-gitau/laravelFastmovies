<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class moviesDetails extends Controller
{
    public function index($id)
    {
        $rawdata = strstr($id, '-', true);
        $movie_id = $rawdata;
        $key = "3c2fd11dc93ee3dfdcf927cc73990153";

        $jsonData = [];
        // https://api.themoviedb.org/3/movie/$movie_id?api_key=3c2fd11dc93ee3dfdcf927cc73990153&append_to_response=credits,images&language=en-US&include_image_language=en
        // ("https://api.themoviedb.org/3/movie/$movie_id/videos?api_key=3c2fd11dc93ee3dfdcf927cc73990153&language=en-US ");
        $response = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
        $jsonData[] = $response->json();
        $trailers = Http::get("https://api.themoviedb.org/3/movie/$movie_id/videos?api_key=$key&language=en-US ");
        $jsonData[] = $trailers->json();
        // similar
        $movies_similar = DB::select('select * from newfastmovies order by a_id desc limit 4');
        // $similar_id1 = json_decode($movies_similar, true);
        $response_similar = [];
        foreach ($movies_similar as $tm) {
            $tm1 = $tm->movie_id;
            $response_similar1 = Http::get("https://api.themoviedb.org/3/movie/$tm1?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
            $response_similar[] = $response_similar1->json();
        }

        $jsonData[] = $response_similar;

        return view::make('movies.index', ['name' => $jsonData]);
    }
}
