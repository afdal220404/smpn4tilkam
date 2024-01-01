<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'sampul'];

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'album_id');
    }
}
