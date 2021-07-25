        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" width="30" height="30"
                    class="d-inline-block align-top" alt="">
                BoolPress
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="{{ route('index') }}">Home</a>
                    <a class="nav-link" href="{{ route('chisiamo') }}">Chi siamo</a>
                    <a class="nav-link" href="{{ route('contattaci') }}">Contattaci</a>
                </div>
                <div class="log_btn">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ route('home') }}" class="btn btn-light">Profilo</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
