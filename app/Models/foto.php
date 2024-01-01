<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;
    protected $fillable = ['album_id', 'foto'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
