@extends('site.home')
@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-tittle-container">
<hr>
    <h5>Dashboard</h5>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    total de Departamentos <h3>{{count($departamentos)}}</h3>
    </div>
    <div class="col-sm">
    total de Cargos <h3>{{count($cargos)}}</h3>
    </div>
    <div class="col-sm">
    total de Funcionários <h3>{{count($funcionarios)}}</h3>
    </div>
  </div>
</div>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
        <p>
            <h6>total de Funcionários por situação</h6>
            Ativo:  {{count($funcionario_ativo)}}
            Inativo:  {{count($funcionario_inativo)}}
            Em férias:  {{count($funcionario_ferias)}}
            Aposentado:  {{count($funcionari_aposentado)}}
        </p>
    </div>
    <div class="col-sm">
        <p>
            <h6>total de Funcionários por categoria</h6>
            Treinee:  {{count($funcionario_treinee)}}
            Júnior:  {{count($funcionario_junior)}}
            Pleno:  {{count($funcionario_pleno)}}
            Senior:  {{count($funcionario_senior)}}
            Master:  {{count($funcionario_master)}}
        </p>
    </div>
    <div class="col-sm">
        <p>
        <h6>Valor total da folha de pagamento</h6>
        R$ {{$funcionario_salario_total}}
        </p>
    </div>
  </div>
</div>
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
<div class="col-md-10 offset-md-1 dashboard-events-container">
    <hr>
        <p>
           <h6>Últimos registros de histórico com filtro por datas e tipo de histórico</h6>
        </p>
        <table width="100%" class="table table-striped table-hover">
        <thead class="thead-dark table-dark">
            <tr>
                <th>Funcionário</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Data</th>
            </tr>
        </thead>
        @foreach($historicoFuncionarios as $historicoFuncionario)
            <tr>
                <td>{{$nome[$historicoFuncionario->id]}}</td>
                <td>{{$historicoFuncionario->tipoHistorico}}</td>
                <td>{{$historicoFuncionario->descricao}}</td>
                <td>{{$historicoFuncionario->data}}</td>
            </tr>
        @endforeach
    </table>
</div>

@endsection

