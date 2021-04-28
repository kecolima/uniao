<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Painel;
use App\Models\Departamento;
use App\Models\Cargo;
use App\Models\Funcionario;
use App\Models\HistoricoFuncionario;

class PainelController extends Controller
{
    public function ver(){
        $departamentos = Departamento::all();
        $cargos = Cargo::all();
        $funcionarios = Funcionario::all();

        $funcionario_ativo = DB::select('select * from funcionarios where situacao = :situacao', ['situacao' => 'Ativo']);
        $funcionario_inativo = DB::select('select * from funcionarios where situacao = :situacao', ['situacao' => 'Inativo']);
        $funcionario_ferias = DB::select('select * from funcionarios where situacao = :situacao', ['situacao' => 'Em férias']);
        $funcionari_aposentado = DB::select('select * from funcionarios where situacao = :situacao', ['situacao' => 'Aposentado']);

        $funcionario_treinee = DB::select('select * from funcionarios where categoria = :categoria', ['categoria' => 'Treinee']);
        $funcionario_junior = DB::select('select * from funcionarios where categoria = :categoria', ['categoria' => 'Júnior']);
        $funcionario_pleno = DB::select('select * from funcionarios where categoria = :categoria', ['categoria' => 'Pleno']);
        $funcionario_senior = DB::select('select * from funcionarios where categoria = :categoria', ['categoria' => 'Sênior']);
        $funcionario_master = DB::select('select * from funcionarios where categoria = :categoria', ['categoria' => 'Master']);

        $funcionario_salario_total = DB::table("funcionarios")->get()->sum("salario");

        $historicoFuncionarios = DB::table('historico_funcionarios')->limit(5)->orderBy('id', 'DESC')->get();

        $total_funcionarios = DB::table('historico_funcionarios')
            ->join('funcionarios', 'historico_funcionarios.id_funcionario', '=', 'funcionarios.id')
            ->select('funcionarios.nome as Funcionario', 'funcionarios.id as funcionariosId')
            ->get();

        return view('admin/dashboard', ['departamentos' => $departamentos, 'cargos' => $cargos,
                                       'funcionarios' => $funcionarios, 'funcionario_ativo' => $funcionario_ativo,
                                       'funcionario_inativo' => $funcionario_inativo, 'funcionario_ferias' => $funcionario_ferias,
                                       'funcionari_aposentado' => $funcionari_aposentado,'funcionario_treinee' => $funcionario_treinee,
                                       'funcionario_junior' => $funcionario_junior, 'funcionario_pleno' => $funcionario_pleno,
                                       'funcionario_senior' => $funcionario_senior, 'funcionario_master' => $funcionario_master,
                                       'funcionario_salario_total' => $funcionario_salario_total, 'historicoFuncionarios' => $historicoFuncionarios,
                                       'total_funcionarios' => $total_funcionarios
                                       ]);
    }

    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin/dashboard', ['funcionarios' => $funcionarios]);
    }

    public function store(Request $request){
        Painel::create([
            'nome' => $request->nome,
            'perfil' => $request->perfil,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        return redirect()->route('ver_painel');
    }

    public function show(Request $request){
        $usuarios = Painel::all();
        return view('painel.todos', ['painel' => $painel]);
    }

    public function destroy($id){
        $painel = Painel::findOrFail($id);
        $painel->delete();
        return redirect()->route('ver_painel');
    }

    public function edit($id){
        $painel = Painel::findOrFail($id);
        return view('painel.editar', ['painel' => $painel]);
    }

    public function update(Request $request){
        $painel = Painel::findOrFail($request->id);
        $painel->update([
            'nome' => $request->nome,
            'perfil' => $request->perfil,
            'email' => $request->email,
            'senha' => $request->senha,
        ]);
        return redirect()->route('ver_painel');
    }
}
