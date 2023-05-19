<div class="container-fluid d-flex align-items-center justify-content-between">

    <a href="{{ route('user.home') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets_user/img/logo.png" alt=""> -->
      <h1>PetClinic<span>.</span></h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>

        @if (Request::is('history*'))
        <li><a class="nav-link scrollto" href="{{ route('user.home') }}">Beranda</a></li>
        <li><a class="nav-link scrollto" href="{{ route('user.home') }}#about">Tentang Kami</a></li>
        <li><a class="nav-link scrollto" href="{{ route('user.home') }}#services">Pelayanan</a></li>
        <li><a class="nav-link scrollto" href="{{ route('user.home') }}#team">Dokter</a></li>
        @else
        <li><a class="nav-link scrollto" href="#">Beranda</a></li>
        <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
        <li><a class="nav-link scrollto" href="#services">Pelayanan</a></li>
        <li><a class="nav-link scrollto" href="#team">Dokter</a></li> 
        @endif
      </ul>
      <i class="bi bi-list mobile-nav-toggle d-none"></i>
    </nav><!-- .navbar -->

    @if (Auth::user())
      <div class="dropdown">
        <button class="btn-getstarted scrollto dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#modal-setting" data-bs-toggle="modal">Pengaturan</a></li>
          <li><a class="dropdown-item" href="{{ route('history.index') }}">Riwayat</a></li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="bi bi-box-arrow-right"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            Logout
          </a>
        </ul>
      </div>
      
      @else
      <a class="btn-getstarted scrollto" href="{{ route('auth.login') }}">Login</a>
    @endif
    

  </div>