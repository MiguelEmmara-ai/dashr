<nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <span class="d-flex justify-content-center align-items-center me-2 bs-icon">
                <img src="https://cdn-icons-png.flaticon.com/512/2369/2369321.png">
            </span>
            <span>| Dashr</span>
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('categories') ? 'active' : '' }}" href="{{ route('categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/random-post">Random Article</a>
                </li>
            </ul>
            <a class="btn btn-primary ms-md-2" role="button" href="{{ route('login') }}"
                style="margin-right: 10px;">Log In</a>
            <a class="btn btn-primary ms-md-2" role="button" href="{{ route('register') }}"
                style="background: rgb(255,255,255);color: rgb(0,0,0);">Sign Up</a>
        </div>
    </div>
</nav>
