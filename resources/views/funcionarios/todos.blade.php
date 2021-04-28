@extends('site.home')
@section('title', 'Listar Funcionários')

@section('content')

<h1>Funcionários</h1>
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

@foreach($funcionarios as $funcionario)
        @php
            $nome[$funcionario->id] = '';
        @endphp
        @foreach($total_funcionarios as $total_funcionario)
            @if  ($total_funcionario->Id == $funcionario->id)
                @php
                    $nome[$funcionario->id] = $total_funcionario->Nome;
                @endphp
            @endif
        @endforeach
    @endforeach

<a class="btn btn-small btn-primary" href="{{ action("FuncionariosController@create") }}">Cadastrar</a>
<hr>
<table width="100%" class="table table-striped table-hover">
    <thead class="thead-dark table-dark">
        <tr>
            <th>Nome</th>
            <th>Data de nascimento</th>
            <th>Sexo</th>
            <th>E-mail</th>
            <th>Senha</th>
            <th>Salário</th>
            <th>Endereços</th>
            <th>Telefone(s)</th>
            <th>Cargo</th>
            <th>Categoria</th>
            <th>Situação</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    @foreach($funcionarios as $funcionario)
        <tr>
            <td>{{$funcionario->nome}}</td>
            <td>{{$funcionario->dataNascimento}}</td>
            <td>{{$funcionario->sexo}}</td>
            <td>{{$funcionario->email}}</td>
            <td>{{$funcionario->senha}}</td>
            <td>{{$funcionario->salario}}</td>
            <td>{{$funcionario->enderecos}}</td>
            <td>{{$funcionario->telefones}}</td>
            <td>{{$nome[$funcionario->id]}}</td>
            <td>{{$funcionario->categoria}}</td>
            <td>{{$funcionario->situacao}}</td>
            <td><a class="alert-link" style="color:#0000FF" href="{{ route('atualizar_funcionario', ['id'=>$funcionario->id])}}" title="Atualizar Usuário {{ $funcionario->nome }}">Editar</a></td>
            <td><a class="alert-link" style="color:#FF0000" href="{{ route('excluir_funcionario', ['id'=>$funcionario->id])}}" title="Excluir Usuário {{ $funcionario->nome }}">Excluir</a></td>
        </tr>
    @endforeach
</table>

@stop
