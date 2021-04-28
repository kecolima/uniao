@extends('site.home')
@section('title', 'Histórico Funcionário')

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
<form action="{{ route('salvar_historico_funcionario') }}" method="POST">
    @csrf

     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Funcionário:</strong>
                <select class="form-control" id="id_funcionario" name="id_funcionario">
                    <option value="">Selecione o funcionário</option>
                    @foreach($funcionarios as $funcionario)
                    <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo histórico:</strong>
                <select class="form-control" id="tipoHistorico" name="tipoHistorico">
                    <option value="">Selecione o tipo de histórico</option>
                    <option value="Admissão">Admissão</option>
                    <option value="Promoção">Promoção</option>
                    <option value="Reajuste de salário">Reajuste de salário</option>
                    <option value="Entrou/Retornou de férias">Entrou/Retornou de férias</option>
                    <option value="Aposentou-se">Aposentou-se</option>
                    <option value="Demissão">Demissão</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descricao"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data:</strong>
                <input type="date" name="data" id="data" class="form-control" placeholder="Perfil">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>

</form>
@stop
