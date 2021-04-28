<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Cargo;

class FuncionariosController extends Controller
{
    public function create(){
        $cargos = Cargo::all();
        return view('funcionarios.create', ['cargos' => $cargos]);
    }

    public function store(Request $request){
        Funcionario::create([
            'nome' => $request->nome,
            'dataNascimento' => $request->dataNascimento,
            'sexo' => $request->sexo,
            'senha' => $request->senha,
            'email' => $request->email,
            'salario' => $request->salario,
            'enderecos' => $request->enderecos,
            'telefones' => $request->telefones,
            'id_cargo' => $request->cargo,
            'categoria' => $request->categoria,
            'situacao' => $request->situacao,
        ]);
        return redirect()->route('ver_funcionario');
    }

    public function show(Request $request){
        $funcionarios = Funcionario::all();
        $total_funcionarios = DB::table('funcionarios')
            ->join('cargos', 'funcionarios.id_cargo', '=', 'cargos.id')
            ->select('funcionarios.id as Id', 'cargos.nome as Nome')
            ->get();
        return view('funcionarios.todos', ['funcionarios' => $funcionarios, 'total_funcionarios' => $total_funcionarios]);
    }

    public function destroy($id){
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();
        return redirect()->route('ver_funcionario');
    }

    public function edit($id){
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.editar', ['funcionario' => $funcionario]);
    }

    public function update(Request $request){
        $funcionario = Funcionario::findOrFail($request->id);
        $funcionario->update([
            'nome' => $request->nome,
            'dataNascimento' => $request->dataNascimento,
            'sexo' => $request->sexo,
            'senha' => $request->senha,
            'email' => $request->email,
            'salario' => $request->salario,
            'enderecos' => $request->enderecos,
            'telefones' => $request->telefones,
            'id_cargo' => $request->cargo,
            'categoria' => $request->categoria,
            'situacao' => $request->situacao,
        ]);
        return redirect()->route('ver_funcionario');
    }
}
