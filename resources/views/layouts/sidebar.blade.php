<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-tachometer"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-table"></i>
            <span>Catalogos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('home') }}">Usuarios</a>
            <a class="dropdown-item" href="{{ route('home') }}">Marcas</a>
            <a class="dropdown-item" href="{{ route('home') }}">PC</a>
            <a class="dropdown-item" href="{{ route('home') }}">Monitor</a>
            <a class="dropdown-item" href="{{ route('home') }}">Licencias</a>
            {{-- <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a> --}}
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span>Reportes</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
        <i class="fa fa-fw fa-flask"></i>
        <span>Tests</span></a>
    </li>
</ul>
