<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedido_factura extends Model
{
    use HasFactory;
    protected $table = 'pedido_factura';
    protected $fillable = ['pedido_id'];

}
