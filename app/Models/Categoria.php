<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $fillable = ['descricao'];

    public function transacoes()
    {
        return $this->hasMany(Transacoes::class, 'id_categoria', 'id');
    }
}
