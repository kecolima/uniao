<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\HistoricoFuncionario;
use App\Models\Funcionario;

class HistoricoFuncionariosController extends Controller
{
    public function create(){
        $funcionarios = Funcionario::all();
        return view('historicoFuncionarios.create', ['funcionarios' => $funcionarios]);
    }

    public function store(Request $request){
        HistoricoFuncionario::create([
            'tipoHistorico' => $request->tipoHistorico,
            'descricao' => $request->descricao,
            'id_funcionario' => $request->id_funcionario,
            'data' => $request->data,
        ]);
        return redirect()->route('ver_historico_funcionario');
    }

    public function show(Request $request){
        $historicoFuncionarios = HistoricoFuncionario::all();
        $total_funcionarios = DB::table('historico_funcionarios')
            ->join('funcionarios', 'historico_funcionarios.id_funcionario', '=', 'funcionarios.id')
            ->select('funcionarios.nome as Funcionario', 'funcionarios.id as funcionariosId')
            ->get();
        return view('historicoFuncionarios.todos', ['historicoFuncionarios' => $historicoFuncionarios, 'total_funcionarios' => $total_funcionarios]);
    }

    public function destroy($id){
        $historicoFuncionario = HistoricoFuncionario::findOrFail($id);
        $historicoFuncionario->delete();
        return redirect()->route('ver_historico_funcionario');
    }

    public function edit($id){
        $historicoFuncionario = HistoricoFuncionario::findOrFail($id);
        return view('historicoFuncionarios.editar', ['historicoFuncionario' => $historicoFuncionario]);
    }

    public function update(Request $request){
        $historicoFuncionario = HistoricoFuncionario::findOrFail($request->id);
        $historicoFuncionario->update([
            'tipoHistorico' => $request->tipoHistorico,
            'descricao' => $request->descricao,
            'id_funcionario' => $request->id_funcionario,
            'data' => $request->data,
        ]);
        return redirect()->route('ver_historico_funcionario');
    }
}
