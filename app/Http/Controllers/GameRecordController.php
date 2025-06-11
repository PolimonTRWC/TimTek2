<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameRecordController extends Controller
{

    public function index(){
        // Fetch all game records, optionally with related game and user
        $records = GameRecord::with(['game', 'user'])->get();

        return view('records.index', compact('records'));
    }
    // Show the form to create a new record
    public function create()
    {
        $games = Game::all();
        return view('records.create', compact('games'));
    }

    // Store a new record
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'notes' => 'nullable|string',
        ]);

        GameRecord::create([
            'user_id' => Auth::id(),
            'game_id' => $request->game_id,
            'notes' => $request->notes,
        ]);

        return redirect()->route('records.index')->with('success', 'Record created!');
    }

    // Show one specific record
    public function show(GameRecord $record)
    {
        $this->authorize('view', $record); // optional if policy used
        return view('records.show', compact('record'));
    }

    // Show the form to edit a record
    public function edit(GameRecord $record)
    {
        $this->authorize('update', $record);
        $games = Game::all();
        return view('records.edit', compact('record', 'games'));
    }

    // Update the record
    public function update(Request $request, GameRecord $record)
    {
        $this->authorize('update', $record);

        $request->validate([
            'game_id' => 'required|exists:games,id',
            'notes' => 'nullable|string',
        ]);

        $record->update([
            'game_id' => $request->game_id,
            'notes' => $request->notes,
        ]);

        return redirect()->route('records.index')->with('success', 'Record updated!');
    }

    // Delete the record
    public function destroy(GameRecord $record)
    {
        $this->authorize('delete', $record);
        $record->delete();

        return redirect()->route('records.index')->with('success', 'Record deleted!');
    }

    public function myGames(){
        $gameRecords = GameRecord::with('game')
                        ->where('user_id', auth()->id())
                        ->get();

        return view('records.my_games', compact('gameRecords'));
    }


}
