<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Funcionario;

class CargosController extends Controller
{
    public function create(){
        $departamentos = Departamento::all();
        return view('cargos.create', ['departamentos' => $departamentos]);
    }

    public function store(Request $request){
        Cargo::create([
            'nome' => $request->nome,
            'id_departamento' => $request->departamento,
            'salarioBase' => $request->salarioBase,
        ]);
        return redirect()->route('ver_cargo');
    }

    public function show(Request $request){
        $cargos = Cargo::all();
        $total_funcionarios = DB::table('cargos')
            ->join('funcionarios', 'cargos.id', '=', 'funcionarios.id_cargo')
            ->join('departamentos', 'cargos.id_departamento', '=', 'departamentos.id')
            ->select('funcionarios.id_cargo as Funcionario', 'cargos.id as Id','cargos.nome as Cargo',
            'cargos.salarioBase as SalarioBase', 'cargos.id_departamento as DepartamentoId',
            'funcionarios.salario as SalarioFuncionario', 'departamentos.nome as Departamento')
            ->get();
        return view('cargos.todos', ['cargos' => $cargos, 'total_funcionarios' => $total_funcionarios]);
    }

    public function destroy($id){
        $cargo = Cargo::findOrFail($id);
        $cargo->delete();
        return redirect()->route('ver_cargo');
    }

    public function edit($id){
        $cargo = Cargo::findOrFail($id);
        return view('cargos.editar', ['cargo' => $cargo]);
    }

    public function update(Request $request){
        $cargo = Cargo::findOrFail($request->id);
        $cargo->update([
            'nome' => $request->nome,
            'id_departamento' => $request->departamento,
            'salarioBase' => $request->salarioBase,
        ]);
        return redirect()->route('ver_cargo');
    }
}
