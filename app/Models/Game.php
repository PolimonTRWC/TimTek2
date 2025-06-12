<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'players', 'played_at', 'user_id'];
    
    public function records(){
        return $this->hasMany(\App\Models\GameRecord::class);
    }
}
