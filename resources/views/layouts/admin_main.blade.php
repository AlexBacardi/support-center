<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@latest/dist/avatar.min.css">
    <link rel="stylesheet" href="{{ asset('build/css/fontawesome/css/all.css') }}">
    <title>AdminPanel</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 bg-primary">
                <div class="d-flex flex-column min-vh-100">
                    <a href="#" class="d-flex align-items-center justify-content-center justify-content-md-start text-white text-decoration-none pt-3 mb-md-0 ms-md-2">
                        <i class="fs-4 fa-solid fa-font"></i><span class="ms-2 fs-5 d-none d-md-inline">adminPanel</span>
                    </a>
                    <hr class="border-white">
                    <ul class="nav flex-column mb-sm-auto" id="menu">
                        <li>
                            <a href="#" class="d-flex align-items-center justify-content-center justify-content-md-start  text-white text-decoration-none pb-3 mb-md-0 ms-md-2">
                                <i class="fa-solid fa-house"></i><span class="ms-2 fs-5 d-none d-md-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#collapseMenu1" data-bs-toggle="collapse" class="d-flex align-items-center justify-content-center justify-content-md-start  text-white text-decoration-none pb-3 mb-md-0 ms-md-2">
                                <i class="fa-solid fa-list"></i><span class="ms-2 fs-5 d-none d-md-inline">Обращения</span><span class="ms-1 small dropdown-toggle d-none d-md-inline"></span>
                            </a>
                            <ul class="collapse nav align-items-center ms-sm-2" id="collapseMenu1">
                                <li class="w-100">
                                    <a href="#" class="d-flex align-items-center justify-content-center justify-content-md-start  text-white text-decoration-none pt-1 pb-2 mb-md-0 ms-md-2">
                                        <i class="fa-solid fa-screwdriver-wrench"></i><span class="ms-2 fs-5 d-none d-md-inline">Заявки</span><span class="ms-1 badge text-bg-secondary d-none d-md-inline">4</span>
                                    </a>
                                </li>
                                <li class="w-100">
                                    <a href="#" class="d-flex align-items-center justify-content-center justify-content-md-start  text-white text-decoration-none py-2 mb-md-0 ms-md-2">
                                        <i class="fa-solid fa-rotate"></i><span class="ms-2 fs-5 d-none d-md-inline">Прочее</span><span class="ms-1 badge text-bg-secondary d-none d-md-inline">4</span>
                                    </a>
                                </li>
                                <li class="w-100">
                                    <a href="#" class="d-flex align-items-center justify-content-center justify-content-md-start  text-white text-decoration-none pt-2 pb-3 mb-md-0 ms-md-2">
                                        <i class="fa-solid fa-envelope-open-text"></i><span class="ms-2 fs-5 d-none d-md-inline">Жалобы</span><span class="ms-1 badge text-bg-secondary d-none d-md-inline">4</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="d-flex align-items-center justify-content-center justify-content-md-start  text-white text-decoration-none mb-md-0 ms-md-2">
                                <i class="fa-solid fa-users"></i><span class="ms-2 fs-5 d-none d-md-inline">Пользователи</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="border-white">
                    <div class="pb-3 pt-1">
                        <a href="#collapseUserMenu" data-bs-toggle="collapse" class="d-flex align-items-center justify-content-center justify-content-md-start text-white text-decoration-none pb-3">
                            <img class="avatar avatar-32 bg-light rounded-circle text-white p-1" src="{{  asset('build/img/avatars/avatar.png') }}">
                            <span class="d-none d-sm-inline mx-1">UserName</span><span class="d-none d-sm-inline ms-1 small dropdown-toggle"></span>
                        </a>
                        <ul class="collapse nav ms-sm-2 text-small" id="collapseUserMenu">
                            <li class="w-100">
                                <a class="d-flex align-items-center justify-content-center justify-content-md-start text-white text-decoration-none pb-3 mb-md-0 ms-sm-2" href="#">
                                    <i class="fa-regular fa-address-card"></i><span class="ms-2 fs-5 d-none d-md-inline">Профиль</span>
                                </a>
                            </li>
                            <li class="w-100">
                                <a class="d-flex align-items-center justify-content-center justify-content-md-start text-white text-decoration-none pb-3 mb-md-0 ms-sm-2" href="#">
                                    <i class="fa-solid fa-right-from-bracket"></i><span class="ms-2 fs-5 d-none d-md-inline">Выход</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                Content area...
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
