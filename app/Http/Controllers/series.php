<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\view;

class series extends Controller
{
    /**
     * Write Your Code..
     *
     */
    public function index()
    {
        $users = DB::table('series')->paginate(20);
        // $users = "ret";
        // $users = series::paginate(10);
        return view('series', compact('users'));
        // return view::make('series', ['users' => $users]);
    }
}
