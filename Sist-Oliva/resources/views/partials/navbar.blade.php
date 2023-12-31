<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- E-COMMERCE TIENDA --}}
            OLIVA DISEÑO E IMPRENTA
        </a>
        @guest
            <div class="dropdown">

                <a class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Menu
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('register') }}">Registrarse </a>
                    <a class="dropdown-item" href="{{ route('login') }}">Log-in </a>

                </div>
            </div>
        @else
            {{-- menu desplegable --}}

            <div class="dropdown">
                <a class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Menu
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/welcome">Administracion</a>
                    <a class="dropdown-item" href="{{route('pedidoCliente')}}">tus pedidos</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                    this.closest('form').submit();">
                            Logout
                        </a>
                    </form>

                </div>
            </div>
            {{-- fin  menu desplegable --}}
<br>
        @endguest



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('shop') }}">TIENDA</a> --}}
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity() }}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                        style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
                </li>
            </ul>
        </div>


    </div>
</nav>
