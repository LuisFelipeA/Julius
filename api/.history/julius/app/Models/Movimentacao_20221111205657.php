<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'data',
        'data_venc',
        'descricao',
        'frquencia',
        'recorrente',
        'users_id',
        'tipo_movimentacoes_id',
    ];
}
