<nav class="navbar-sabues">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-8">
                <img class="logo-nav mb-5" src="{{ asset('img/icons/dog.svg') }}" alt=""><a href="/" class="text-logo navbar-brand">SabuesoCoin!</a> 
            </div>
            <div class="col-4">
                <div class="row">
                    
                    <div class="col-4"><a class="nav-brand sombra" href="{{ route('home') }}"><img class="menu-navbar" src="{{ asset('img/icons/home-run.svg') }}" alt="map"></a></div>
                    <div class="col-4"><a class="nav-brand sombra" href="{{ route('map') }}"><img class="menu-navbar" src="{{ asset('img/icons/sitio.svg') }}" alt="map"></a></div>
                    @guest
                        <div class="col-4"><a class="nav-brand sombra" href="{{ route('login') }}"><img class="menu-navbar" src="{{ asset('img/icons/login.svg') }}" alt="login"></a></div>
                        @else
                            <div class="col-4"><a class="nav-brand sombra" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><img class="menu-navbar" src="{{ asset('img/icons/cerrar-sesion.svg') }}" alt=""></a></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    @endguest
                </div>                
            </div>
            
        </div>
    </div> 
</nav>