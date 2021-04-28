<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $fillable = ['nome','dataNascimento','sexo','dataNascimento','senha','email','salario',
                           'enderecos','telefones','id_cargo','categoria','situacao'];
}
