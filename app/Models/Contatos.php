<?php

namespace App\Models;

use Database\Factories\ContatosFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{

    use HasFactory;
    
    protected static function newFactory(): Factory
    {
        return ContatosFactory::new();
    }
}
