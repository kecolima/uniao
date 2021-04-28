<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoFuncionario extends Model
{
    use HasFactory;
    protected $fillable = ['data','tipoHistorico','descricao','id_funcionario'];
}
