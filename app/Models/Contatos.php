<?php

namespace App\Models;

use Database\Factories\ContatosFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contatos extends Model
{

    use HasFactory;

    protected $fillable = ['user_id', 'nome', 'cpf'];

    
    protected static function newFactory(): Factory
    {
        return ContatosFactory::new();
    }

    /**
     * Pertence ao User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
