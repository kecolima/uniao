@extends('site.home')
@section('title', 'Editar Cargos')

@section('content')

<h1>Editar Cargos</h1>
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
<form action="{{ route('atualizar_cargo', ['id' => $cargo->id]) }}" method="POST">

    @csrf

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            <input type="text" name="nome" id="nome" value="{{$cargo->nome}}" class="form-control" placeholder="Nome">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departamento:</strong>
                <select class="form-control" id="departamento" name="departamento">
                    <option value="{{$cargo->departamento}}">{{$cargo->departamento}}</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salário base:</strong>
                <input type="text" name="salarioBase" id="salarioBase" value="{{$cargo->salarioBase}}" class="form-control" placeholder="Salário base">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@stop
