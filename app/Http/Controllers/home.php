<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class home extends Controller
{
    public function index()
    {
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
        return view('home', ['users' => $jsonData], ['ret' => "We"]);
    }
}
