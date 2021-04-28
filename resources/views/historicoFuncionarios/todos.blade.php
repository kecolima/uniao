@extends('site.home')
@section('title', 'Histórico Funcionários')

@section('content')

<h1>Histórico de Funcionários</h1>
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

@foreach($historicoFuncionarios as $historicoFuncionario)
        @php
            $nome[$historicoFuncionario->id] = '';
        @endphp
        @foreach($total_funcionarios as $total_funcionario)
            @if  ($total_funcionario->funcionariosId == $historicoFuncionario->id_funcionario)
                @php
                    $nome[$historicoFuncionario->id] = $total_funcionario->Funcionario;
                @endphp
            @endif
        @endforeach
    @endforeach

<a class="btn btn-small btn-primary" href="{{ action("HistoricoFuncionariosController@create") }}">Cadastrar</a>
    <hr>
    <table width="100%" class="table table-striped table-hover">
        <thead class="thead-dark table-dark">
            <tr>
                <th>Funcionário</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Data</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach($historicoFuncionarios as $historicoFuncionario)
            <tr>
                <td>{{$nome[$historicoFuncionario->id]}}</td>
                <td>{{$historicoFuncionario->tipoHistorico}}</td>
                <td>{{$historicoFuncionario->descricao}}</td>
                <td>{{$historicoFuncionario->data}}</td>
                <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_historico_funcionario', ['id'=>$historicoFuncionario->id])}}" title="Atualizar Usuário {{ $historicoFuncionario->nome }}">Editar</a></td>
                <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_historico_funcionario', ['id'=>$historicoFuncionario->id])}}" title="Excluir Usuário {{ $historicoFuncionario->nome }}">Excluir</a></td>
            </tr>
        @endforeach
    </table>

@stop

