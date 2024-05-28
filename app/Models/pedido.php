<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $fillable = ['menu_id', 'cantidad', 'user_id', 'fecha','estado'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
     // Relación con el modelo User
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
