<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::where('user_id', Auth::id())->get();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|unique:games,name',
            'description' => 'nullable|string',
        ]);

        $game = new Game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    public function update(Request $request, Game $game){
        
        $request->validate([
            'name' => 'required|unique:games,name,' . $game->id,
            'description' => 'nullable|string',
        ]);

        // Update the game after validation passes
        $game->name = $request->name;
        $game->description = $request->description;
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        if ($game->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        $game->delete();
        return redirect()->route('games.index');
    }
}
