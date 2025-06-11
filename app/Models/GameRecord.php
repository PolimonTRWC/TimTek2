<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameRecord extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'game_id', 'player_count', 'play_duration', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game(){
        return $this->belongsTo(Game::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
