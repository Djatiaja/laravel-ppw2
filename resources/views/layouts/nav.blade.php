<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid px-5 py-2">
        <a class="navbar-brand fs-3" href="/">Toko Buku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5 d-flex w-100 h-100">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard-user') }}">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard-email') }}">Email</a>
                    </li>
                @endif
                <li class="nav-item ">
                    <a class="nav-link" href="/galeri">Galeri</a>
                </li>
                <li class="nav-item me-auto">
                    <a class="nav-link" href="/about">About</a>
                </li>
                @if (!\Auth::check())
                    <li class="nav-item btn btn-primary py-0 ">
                        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <form action="{{ route('logout') }}" method="post" class="">
                        @csrf
                        <button class="nav-link text-white nav-item btn-danger btn py-2">Logout</button>
                    </form>
                @endif
            </ul>
        </div>
    </div>
</nav>
