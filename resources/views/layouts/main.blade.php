<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.min.css">
    <link rel="stylesheet" href="{{ asset('build/css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('build/css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('build/img/favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', 'Центр поддержки')</title>
</head>

<body>
    <header class="header mb-3">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row justify-content-md-between">
                    <div class="col-7 col-md-4">
                        <div class="header-top-logo">
                            <a href="{{ route('index')}}" class="navbar-brand">
                                <img src="{{ asset('build/img/logo/logo1.png') }}" alt="" class="d-none d-md-inline">
                                Центр поддержки
                            </a>
                        </div>
                    </div>
                    <div class="col-5 col-md-4 col-lg-2">
                        @auth
                            <div class="header-menu">
                                <div class="dropdown text-end  pt-1">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Запросы <span class="badge text-bg-info d-none d-md-inline bg-white">4</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('cabinet.all-queries') }}">Мои Запросы <span class="badge text-bg-secondary">4</span></a></li>
                                        <li><a class="dropdown-item" href="{{ route('cabinet.profile')}}">Профиль</a></li>
                                        <li>
                                            <form action="{{ route('logout')}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Выход</button>
                                            </form>
                                            {{-- <a class="dropdown-item" href="{{ route('logout') }}">Выход</a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>
    <mian class="main">
        <section class="content-wrapper">
            @yield('content')
        </section>
    </mian>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
