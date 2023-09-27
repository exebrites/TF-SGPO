<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- E-COMMERCE TIENDA --}}
            OLIVA DISEÑO E IMPRENTA
        </a>
       @guest
       <a href="{{route('login')}}">Log-in | </a>
        @else
       <form method="POST" action="{{ route('logout') }}">
        @csrf
            <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                    this.closest('form').submit();">
            Logout
            </a>
        </form>
        <a href="/welcome">Administracion</a>
        @endguest

        {{-- menu desplegable --}}
      

              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Cuenta
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Login</a></li>
                      <li><a class="dropdown-item" href="#">Logout</a></li>
                      <li><a class="dropdown-item" href="#">Administracion</a></li>
                    </ul>
                  </li>
                </ul>
              </div>



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('shop') }}">TIENDA</a> --}}
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
                </li>
            </ul>
        </div>

        
    </div>
</nav>

