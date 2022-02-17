<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav me-auto">

    </ul>


    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">Kategori</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('pemasukan.index')}}">Pemasukan</a>
                <a class="dropdown-item" href="{{route('pengeluaran.index')}}">Pengeluaran</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('jenis.index')}}">Master Jenis</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/transaksi')}}">Transaksi</a>
        </li>
        <!-- Authentication Links -->
        @guest
        {{-- @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif --}}
        @else
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">Kategori</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('pemasukan.index')}}">Pemasukan</a>
                <a class="dropdown-item" href="{{route('pengeluaran.index')}}">Pengeluaran</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('jenis.index')}}">Master Jenis</a>
            </div>
        </li>

        @endguest
    </ul>
</div>