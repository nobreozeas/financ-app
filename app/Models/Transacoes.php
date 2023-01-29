<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacoes extends Model
{
    use HasFactory;

    protected $table = 'transacoes';
    protected $fillable = ['id_categoria', 'descricao', 'data', 'valor', 'tipo'];
}
