<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class seriesDetails extends Controller
{
    public function index($id)
    {
        $users = DB::table('series')->where('a_id', $id)->get();
        return view::make('series.index', ['name' => $users]);
    }
    public function download($id)
    {
        $all = [];
        $users = DB::table('series')->where('a_id', $id)->get();
        $pid = $users[0]->a_id;
        $s_name = $users[0]->s_name;
        // get seasons
        $a_id = [];
        $a_id[] = DB::table('seriesons')->where('parent_id', $pid)->get();
        $all[] = $a_id;
        // get episodes
        $down_season = [];
        // $episodes = [];
        // $darray = [];
        $result = [];
        foreach ($a_id[0] as $key => $value) {
            $down_season1 = $value->season;
            $down_season[] = $down_season1;
            // dowwnload array
            $name = array("name" => $value->s_name);
            $darray = array("season" => $down_season1);
            $episodes = array("content" => DB::table('seriesdetails')->where('parent_id', $pid)->where('s_season', $down_season1)->get());
            // merge arrays
            $result[] = array_merge($darray, $episodes, $name);
        }
        // get next item and previous item
        $next = array("next" => DB::table('series')->where('s_name', '>', $s_name)->orderBy('s_name', 'Asc')->limit(1)->get());
        // get previous item
        $previous = array("previous" => DB::table('series')->where('s_name', '<', $s_name)->orderBy('s_name', 'Desc')->limit(1)->get());
        // latest series
        $latest = array("latest" => DB::table('series')->orderBy('a_id', 'Desc')->limit(3)->get());
        // $all[] = $next;
        $alladd = [];
        $alladd[] = $next;
        $alladd[] = $previous;
        $alladd[] = $latest;
        $all[] = $down_season;
        $all[] = $result;
        return view::make('series.download.index', ['name' => $all, 'next' => $alladd]);
    }
}
