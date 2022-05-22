<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;

class moviesDetails extends Controller
{
    public function index($id)
    {
        $name = $id;
        return view::make('movies.index', ['name' => $name]);
    }
}
