<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GameController extends Controller
{
    use AuthorizesRequests;

    public function index() {
        if (Auth::user()->is_admin) {
            $games = Game::all();
        } else {
            $games = Game::where('user_id', Auth::id())->get();
        }

        return view('games.index', compact('games'));
    }

    public function create(){
        $this->authorize('create', Game::class);
        $game = new Game();

        return view('games.create', compact('game'));
    }

    public function store(Request $request){
        $this->authorize('create', Game::class);

        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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


    public function edit(Game $game){   
        $this->authorize('update', $game);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game){
        $this->authorize('update', $game);

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

    public function destroy(Game $game)
    {
        $this->authorize('delete', $game);

        $game->delete();
        return redirect()->route('games.index');
    }
}
