<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index() {
        if (Auth::user()->is_admin) {
            $games = Game::all();
        } else {
            $games = Game::where('user_id', Auth::id())->get();
        }

        return view('games.index', compact('games'));
    }


    public function create(){
        $predefinedGames = ['Catan', 'Chess', 'Monopoly', 'Carcassonne', 'Ticket to Ride', 'Codenames'];
        return view('games.create', compact('predefinedGames'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:games,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'players' => 'required|integer|min:1|max:20',
            'played_at' => 'nullable|date',
        ]);

        $game = new Game();
        $game->user_id = Auth::id();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->players = $request->players;
        $game->played_at = $request->played_at;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('games', 'public');
            $game->image = $path;
        }

        $game->save();

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }


    public function update(Request $request, Game $game){
        if ($game->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|unique:games,name,' . $game->id,
            'description' => 'nullable|string',
            'players' => 'required|integer|min:1|max:20',
            'played_at' => 'nullable|date',
        ]);

        $game->name = $request->name;
        $game->description = $request->description;
        $game->players = $request->players;
        $game->played_at = $request->played_at;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('game_images', 'public');
            $game->image = $path;
        }

        $game->save();

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }
    public function edit(Game $game){   
        if ($game->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $predefinedGames = ['Catan', 'Chess', 'Monopoly', 'Carcassonne', 'Ticket to Ride', 'Codenames'];
        return view('games.edit', compact('game', 'predefinedGames'));
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
