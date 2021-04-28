<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Funcionario;

class DepartamentosController extends Controller
{
    public function create(){
        return view('departamentos.create');
    }

    public function store(Request $request){
        Departamento::create([
            'nome' => $request->nome,
            'telefones' => $request->telefones,
        ]);
        return redirect()->route('ver_departamento');
    }

    public function show(Request $request){
        $departamentos = Departamento::all();
        $total_funcionarios = DB::table('cargos')
            ->join('funcionarios', 'cargos.id', '=', 'funcionarios.id_cargo')
            ->join('departamentos', 'cargos.id_departamento', '=', 'departamentos.id')
            ->select('funcionarios.id_cargo as Funcionario', 'cargos.id as Id','cargos.nome as Cargo',
            'cargos.salarioBase as SalarioBase', 'cargos.id_departamento as DepartamentoId',
            'funcionarios.salario as SalarioFuncionario', 'departamentos.nome as Departamento')
            ->get();
        return view('departamentos.todos', ['departamentos' => $departamentos, 'total_funcionarios' => $total_funcionarios]);
    }

    public function destroy($id){
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('ver_departamento');
    }

    public function edit($id){
        $departamento = Departamento::findOrFail($id);
        return view('departamentos.editar', ['departamento' => $departamento]);
    }

    public function update(Request $request){
        $departamento = Departamento::findOrFail($request->id);
        $departamento->update([
            'nome' => $request->nome,
            'telefones' => $request->telefones,
        ]);
        return redirect()->route('ver_departamento');
    }
}
