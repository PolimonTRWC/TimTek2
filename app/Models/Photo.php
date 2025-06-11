<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['game_record_id', 'image_path'];

    public function gameRecord()
    {
        return $this->belongsTo(GameRecord::class);
    }
}
