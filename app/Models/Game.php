<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'players',
        'played_at',
        'image',
        'user_id',
        'category_id',
    ];
    
    public function records(){
        return $this->hasMany(\App\Models\GameRecord::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

}
