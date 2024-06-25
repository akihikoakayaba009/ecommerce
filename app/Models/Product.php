<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definição das propriedades e métodos do modelo



    protected $fillable = [
        'name', 'price', 'stock', 'description', 'cover'
    ];

    // Você pode adicionar outros métodos e relações aqui, conforme necessário
}
