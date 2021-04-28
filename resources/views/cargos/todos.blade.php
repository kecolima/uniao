@extends('site.home')
@section('title', 'Listar Cargos')

@section('content')

@if (count($errors) > 0)
	<div class="alert alert-danger">
	<strong>Erros:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

<h1>Cargos</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
        <strong>Erros:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @php
        $totalCargos = 0;
    @endphp

    @foreach($cargos as $cargo)
        @php
            $totalfuncionarios[$cargo->id] = 0;
            $totalsalarios[$cargo->id] = 0;
            $departamento[$cargo->id] = '';
        @endphp
        @foreach($total_funcionarios as $total_funcionario)
            @if  ($total_funcionario->Funcionario == $cargo->id)
                @php
                    $totalfuncionarios[$cargo->id]++;
                    $totalsalarios[$cargo->id] = $totalsalarios[$cargo->id] + $total_funcionario->SalarioFuncionario;
                @endphp
            @endif
            @if  ($total_funcionario->DepartamentoId == $cargo->id_departamento)
                @php
                    $departamento[$cargo->id] = $total_funcionario->Departamento;
                @endphp
            @endif
        @endforeach
    @endforeach

    <a class="btn btn-small btn-primary" href="{{ action("CargosController@create") }}">Cadastrar</a>
    <hr>

    <table width="100%" class="table table-striped table-hover">
        <thead class="thead-dark table-dark">
            <tr>
                <th>Nome</th>
                <th>Departamento</th>
                <th>Salário base</th>
                <th>Total de Funcionários</th>
                <th>total de salários</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach($cargos as $cargo)
            <tr>
                <td>{{$cargo->nome}}</td>
                <td>{{$departamento[$cargo->id]}}</td>
                <td>{{$cargo->salarioBase}}</td>
                <td>{{$totalfuncionarios[$cargo->id]}}</td>
                <td>{{$totalsalarios[$cargo->id]}}</td>
                <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_cargo', ['id'=>$cargo->id])}}" title="Atualizar Usuário {{ $cargo->nome }}">Editar</a></td>
                <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_cargo', ['id'=>$cargo->id])}}" title="Excluir Usuário {{ $cargo->nome }}">Excluir</a></td>
            </tr>
            @php
                $totalCargos++;
            @endphp
        @endforeach
    </table>

    <table>
        <tr><th>Total de Cargos: {{$totalCargos}}</th></tr>
    </table>

@stop
