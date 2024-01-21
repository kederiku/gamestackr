<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->paginate(24);
        return view('pages.games.index', compact('games'));
    }

    public function show(string $slug, string $id)
    {
        $game = Game::findOrFail($id);
        if ($game->slug != $slug) {
            abort(404);
        }
        return view('pages.games.show', compact('game'));
    }
}
