@extends('site.home')
@section('title', 'Cadastrar Funcionários')

@section('content')

<h1>Cadastro de Funcionários</h1>
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
<form action="{{ route('salvar_funcionario') }}" method="POST">

    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data de Nascimento:</strong>
                <input type="text" name="dataNascimento" id="dataNascimento" class="form-control" placeholder="Data de Nascimento">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sexo:</strong>
                <select class="form-control" id="sexo" name="sexo">
                    <option value="">Selecione o sexo</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Senha:</strong>
                <input type="text" name="senha" id="senha" class="form-control" placeholder="Senha">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                <input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salário:</strong>
                <input type="text" name="salario" id="salario" class="form-control" placeholder="Salário">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Endereços:</strong>
                <input type="text" name="enderecos" id="enderecos" class="form-control" placeholder="Endereço">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone(s):</strong>
                <input type="text" name="telefones" id="telefones" class="form-control" placeholder="Senha">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cargo:</strong>
                <select class="form-control" id="cargo" name="cargo">
                    @foreach($cargos as $cargo)
                    <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="">Selecione a categoria</option>
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
                    <option value="">Selecione a situação</option>
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
