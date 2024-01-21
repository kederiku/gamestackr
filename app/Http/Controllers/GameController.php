<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        #$games_list = Game::orderBy('published_at', 'desc')->paginate(24);
        return view('pages.games.index');
    }
}
