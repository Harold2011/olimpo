<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anuncio extends Model
{
    protected $table = 'anuncio';
    protected $fillable = ['nombre', 'url'];
}
