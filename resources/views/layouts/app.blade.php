<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin KPU | @yield('title')</title>
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="sidebar">
        <h4 class="text-center">Dashboard</h4>
        <a href="#">Dashboard</a>
        <a href="#">Siswa</a>
        
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle w-100 text-start" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Indikator
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Kategori Indikator</a></li>
                <li><a class="dropdown-item" href="#">Indikator</a></li>
            </ul>
        </div>

        <a href="#">Prestasi</a>
    </div>

    <div class="content">
        <div class="topbar d-flex justify-content-between align-items-center">
            <h4 class="text-white">Welcome to Dashboard</h4>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    User Menu
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="container mt-4">
          @yield('content')
        </div>
    </div>
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</body>

</html>
