<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Category; 

class GameController extends Controller
{
    use AuthorizesRequests;

    public function index() {
        if (Auth::user()->is_admin) {
            $games = Game::with(['category', 'notes'])->get();
        } else {
            $games = Game::where('user_id', Auth::id())->with(['category', 'notes'])->get();
        }

        return view('games.index', compact('games'));
    }


   public function create(){
        $this->authorize('create', Game::class);
        $game = new Game();
        $categories = Category::all();
        return view('games.create', compact('game', 'categories'));
    }


    public function store(Request $request){
        $this->authorize('create', Game::class);

        \Log::info('Store method called', ['request_data' => $request->except('_token')]);
        
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'players' => 'required|integer|min:1|max:20',
            'played_at' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',          
        ]);

        $game = new Game();
        $game->user_id = Auth::id();
        $game->name = $request->name;
        $game->players = $request->players;
        $game->played_at = $request->played_at;
        $game->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            \Log::info('File found in request', [
                'original_name' => $request->file('image')->getClientOriginalName(),
                'size' => $request->file('image')->getSize()
            ]);
            
            $path = $request->file('image')->store('game_images', 'public');
            $game->image = $path;
            
            \Log::info('File stored at:', ['path' => $path]);
        } else {
            \Log::info('No image file found in request');
        }

        $game->save();

        if ($request->filled('note')) {
            $game->notes()->create(['content' => $request->note]);
        }

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }



    public function edit(Game $game){   
        $this->authorize('update', $game);
        $categories = Category::all();
        return view('games.edit', compact('game', 'categories'));
    }

    public function update(Request $request, Game $game){
        $this->authorize('update', $game);

        $request->validate([
            'name' => 'required|unique:games,name,' . $game->id,
            'players' => 'required|integer|min:1|max:20',
            'played_at' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        
        $game->name = $request->name;
        $game->players = $request->players;
        $game->played_at = $request->played_at;
        $game->category_id = $request->category_id;

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
