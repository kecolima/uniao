@extends('site.home')
@section('title', 'Editar Funcionários')

@section('content')

<h1>Editar Funcionários</h1>
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
<form action="{{ route('atualizar_funcionario', ['id' => $funcionario->id]) }}" method="POST">

    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" id="nome" value="{{$funcionario->nome}}" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data de Nascimento:</strong>
                <input type="text" name="dataNascimento" id="dataNascimento" value="{{$funcionario->dataNascimento}}" class="form-control" placeholder="Data de Nascimento">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sexo:</strong>
                <select class="form-control" id="sexo" name="sexo">
                    <option value="{{$funcionario->sexo}}">{{$funcionario->sexo}}</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Senha:</strong>
                <input type="text" name="senha" id="senha" value="{{$funcionario->senha}}" class="form-control" placeholder="Senha">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                <input type="text" name="email" id="email" value="{{$funcionario->email}}" class="form-control" placeholder="E-mail">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salário:</strong>
                <input type="text" name="salario" id="salario" value="{{$funcionario->salario}}" class="form-control" placeholder="Salário">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Endereços:</strong>
                <input type="text" name="enderecos" id="enderecos" value="{{$funcionario->enderecos}}" class="form-control" placeholder="Endereço">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone(s):</strong>
                <input type="text" name="telefones" id="telefones" value="{{$funcionario->telefones}}" class="form-control" placeholder="Senha">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cargo:</strong>
                <input type="text" name="cargo" id="cargo" value="{{$funcionario->cargo}}" class="form-control" placeholder="Cargo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="{{$funcionario->categoria}}">{{$funcionario->categoria}}</option>
                    <option value="Treinee">Treinee</option>
                    <option value="Júnior">Júnior</option>
                    <option value="Pleno">Pleno</option>
                    <option value="Sênior">Sênior</option>
                    <option value="Master">Master</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Situação:</strong>
                <select class="form-control" id="situacao" name="situacao">
                    <option value="{{$funcionario->situacao}}">{{$funcionario->situacao}}</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                    <option value="Em férias">Em férias</option>
                    <option value="Aposentado">Aposentado</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>

</form>
@stop
