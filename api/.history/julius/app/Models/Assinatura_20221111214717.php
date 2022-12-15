<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'assinaturas';

    protected $fillable = [
        'users_id',
        'nome',
        'valor',
        'descricao'
    ];

}
