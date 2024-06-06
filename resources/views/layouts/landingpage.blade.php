<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-white card" >
      <div class="container">
        <img src="../img/logobbkkp.jpeg"  style="max-width: 250px; height: auto;" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              
              <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-houses-fill"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-currents="page" href="/pendaftaran"><i class="bi bi-pencil-square"></i> Pendaftaran</a>
            </li>
            @auth
              <li class="nav-item">
                <a class="nav-link active" aria-currents="page" href="/riwayat-pendaftaran"><i class="bi bi-person-lines-fill"></i> Riwayat Pendaftaran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-currents="page" href="/user/jadwal-pelatihan"><i class="bi bi-person-lines-fill"></i> Jadwal Pelatihan</a>
              </li>
            @endauth
            
            <li class="nav-item">
              <a class="nav-link active" aria-currents="page" href="#"><i class="bi bi-person-lines-fill"></i> Kontak</a>
            </li>
          </ul>
          <ul class="navbar-nav">

            @if (Route::has('login'))
            @auth
                @if (Auth::user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="fw-bold nav-link text-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           <button class="btn btn-primary">Logout</button>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            @else
                <li class="nav-item">
                    <a class="fw-bold nav-link " href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="fw-bold nav-link nav-menu" href="{{ route('register') }}"><button class="btn">Register</button>
                        </a>
                    </li>
                @endif
            @endauth
        @endif
          </ul>
        </div>
      </div>
    </nav>
   @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>