<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div id="navbar" class="container-fluid bg-primary">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><img alt="UDV" src="{{url(mix('site/img/udv.png'))}}" class="img-responsive"></a>
        </div>
        <ul class="nav navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="/painel">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usuario/ver">USUÁRIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cargo/ver">CARGO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/departamento/ver">DEPARTAMENTO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/funcionario/ver">FUNCIONÁRIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/historico_funcionario/ver">HISTÓRICO</a>
                <li class="nav-item">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ route('admin.logout')}}">Logout</a>
            </li>
        </ul>
    </div>
</nav>



