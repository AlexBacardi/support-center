<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.min.css">
    <link rel="stylesheet" href="{{ asset('build/css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('build/css/admin/main.css') }}">
    <title>@yield('title', 'AdminPanel')</title>
</head>

<body>
    <div class="offcanvas offcanvas-start left-navbar bg-primary" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <div class="d-flex flex-column">
                <a href="{{ route('admin.index')}}" class="d-flex justify-content-center justify-content-lg-start text-white text-decoration-none pt-3 ms-lg-3">
                    <i class="fs-4 d-lg-none fa-solid fa-font"></i><span class="ms-2 fs-5 d-none d-lg-inline text-uppercase ">adminPanel</span>
                </a>
                <hr class="border-white">
                <div>
                    <a href="#collapseUserMenu" data-bs-toggle="collapse" class="d-flex align-items-center justify-content-center justify-content-lg-start text-white text-decoration-none collapse-link ms-lg-3">
                        <img class="avatar avatar-32 bg-light rounded-circle text-white p-1" src="{{ is_null(auth()->user()->profile->avatar) ? asset('build/img/avatars/avatar.png') : asset('storage/' . auth()->user()->profile->avatar) }}">
                        <span class="d-none d-lg-inline mx-1">{{ auth()->user()->name }}</span><i class="fas fa-angle-down my-auto ms-2 d-none d-lg-inline"></i>
                    </a>
                    <ul class="collapse nav ms-lg-4" id="collapseUserMenu">
                        <li class="w-100 py-2">
                            <a class="d-flex align-items-center justify-content-center justify-content-lg-start text-white text-decoration-none" href="{{ route('admin.users.show', auth()->user()->id )}}">
                                <i class="fa-regular fa-address-card"></i><span class="ms-2 d-none d-lg-inline">Профиль</span>
                            </a>
                        </li>
                        <li class="w-100 py-2">
                            <form action="{{ route('logout')}}" method="POST" class="d-flex align-items-center justify-content-center justify-content-lg-start p-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white nav-link p-0">
                                    <i class="fa-solid fa-right-from-bracket"></i><span class="ms-2 d-none d-lg-inline">Выход</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <hr class="border-white">
                <ul class="navbar-nav" id="menu">
                    <li class="mb-3">
                        <a href="{{ route('index')}}" class="d-flex align-items-center justify-content-center justify-content-lg-start text-white text-decoration-none ms-lg-3">
                            <i class="fa-solid fa-house"></i><span class="ms-2 d-none d-lg-inline">Home</span>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#collapseMenu1" data-bs-toggle="collapse" class="d-flex align-items-center justify-content-center justify-content-lg-start  text-white text-decoration-none ms-lg-3 collapse-link">
                            <i class="fa-solid fa-list"></i><span class="ms-2 d-none d-lg-inline">Обращения</span><i class="fas fa-angle-down my-auto ms-2 d-none d-lg-inline"></i>
                        </a>
                        <ul class="collapse nav mt-1 ms-lg-4" id="collapseMenu1">
                            <li class="w-100 py-2">
                                <a href="{{ route('admin.requests')}}" class="d-flex align-items-center justify-content-center justify-content-lg-start  text-white text-decoration-none">
                                    <i class="fa-solid fa-screwdriver-wrench"></i><span class="ms-2 d-none d-lg-inline">Заявки</span>
                                    @if($requestCount > 0)
                                    <span class="ms-2 badge text-bg-secondary d-none d-lg-inline">{{ $requestCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="w-100 py-2">
                                <a href="{{ route('admin.requests', ['type' => 2]) }}" class="d-flex align-items-center justify-content-center justify-content-lg-start  text-white text-decoration-none">
                                    <i class="fa-solid fa-rotate"></i><span class="ms-2 d-none d-lg-inline">Прочее</span>
                                    @if ($otherRequestCount > 0)
                                        <span class="ms-2 badge text-bg-secondary d-none d-lg-inline">{{ $otherRequestCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="w-100 py-2">
                                <a href="#" class="d-flex align-items-center justify-content-center justify-content-lg-start  text-white text-decoration-none">
                                    <i class="fa-solid fa-envelope-open-text"></i><span class="ms-2 d-none d-lg-inline">Жалобы</span><span class="ms-2 badge text-bg-secondary d-none d-lg-inline">4</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.users')}}" class="d-flex align-items-center justify-content-center justify-content-lg-start  text-white text-decoration-none ms-lg-3">
                            <i class="fa-solid fa-users"></i><span class="ms-2 d-none d-lg-inline">Пользователи</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 w-100">
        <main class="pt-4 flex-grow-1 ">
            @yield('content')
        </main>
        <footer class="border-top">
            <div class="d-flex py-3">
                <span class="ps-3 mx-auto mx-md-0 fw-medium">&copy "ADMINPANEL", {{ now()->Format('Y') }}</span>
                <span class="pe-2 ms-auto d-none d-md-inline">version 1.0</span>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
