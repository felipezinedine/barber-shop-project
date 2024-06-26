<nav class="mb-auto navbar navbar-expand-lg navbar-light bg-light text-center">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
            @if (auth()->user())
                <div class="dropdown ml-auto">
                    <a class="nav-link dropdown-toggle active text-light" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-circle-user"></i> {{ auth()->user()->firstName }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @if (auth()->user()->type == 'admin')
                            <a class="dropdown-item" href="/admin/dashboard">DASHBOARD</a>
                        @endif
                        <a class="dropdown-item" href="/admin/product">INÍCIO</a>
                        <a class="dropdown-item" href="/logout">LOGOUT</a>
                    </div>
                </div>
            @else
                <div class="dropdown ml-auto">
                    <a class="nav-link dropdown-toggle active text-light" href="#" id="loginDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-circle-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
                        <a class="dropdown-item" href="/auth">ENTRAR</a>
                    </div>
                </div>
            @endif
            <li class="nav-item">
                <a class="nav-link active text-light" href="/schedule/">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-light" href="/schedule/new">AGENDAR</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-light" href="/reservations/">RESERVAS</a>
            </li>
        </ul>
    </div>
    {{-- <div class="ml-auto">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown ml-auto">
          <a class="nav-link dropdown-toggle active text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-circle-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Entrar</a>
          </div>
        </li>
      </ul>
  </div> --}}
</nav>
