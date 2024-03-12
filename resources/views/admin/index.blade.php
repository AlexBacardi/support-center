@extends('layouts.admin_main')
@section('title', 'Информация')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12">
                <h4>Информация</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <h4 class="card-title pt-3 pb-2 pb-md-0 fs-3 ps-3 m-0">45</h4>
                    <div class="card-body pb-2 pt-0 d-flex align-items-center">
                        <span class="text-uppercase fw-medium">Пользователи</span>
                        <i class="fa-solid ms-auto me-2 fa-users d-none d-sm-inline icon py-2"></i>
                    </div>
                    <div class="card-footer py-3 d-flex">
                        <a class="nav-link" href="#">Подробнее</a>
                        <span class="ms-auto">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-3">
                <div class="card bg-warning text-white h-100">
                    <h4 class="card-title pt-3 pb-2 pb-md-0 fs-3 ps-3 m-0">115</h4>
                    <div class="card-body pb-2 pt-0 d-flex align-items-center">
                        <span class="text-uppercase fw-medium">Заявки</span>
                        <i class="fa-solid fa-screwdriver-wrench ms-auto d-none d-sm-inline me-2 fa-users icon py-2"></i>
                    </div>
                    <div class="card-footer py-3 d-flex">
                        <a class="nav-link" href="{{ route('admin.all-request')}}">Подробнее</a>
                        <span class="ms-auto">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-3">
                <div class="card bg-success text-white h-100">
                    <h4 class="card-title pt-3 pb-2 pb-md-0 fs-3 ps-3 m-0">19</h4>
                    <div class="card-body pb-2 pt-0 d-flex align-items-center">
                        <span class="text-uppercase fw-medium">Прочее</span>
                        <i class="fa-solid fa-rotate ms-auto me-2 d-none d-sm-inline fa-users icon py-2"></i>
                    </div>
                    <div class="card-footer py-3 d-flex">
                        <a class="nav-link" href="#">Подробнее</a>
                        <span class="ms-auto">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-3">
                <div class="card bg-danger text-white h-100">
                    <h4 class="card-title pt-3 pb-2 pb-md-0 fs-3 ps-3 m-0">5</h4>
                    <div class="card-body pb-2 pt-0 d-flex align-items-center">
                        <span class="text-uppercase fw-medium">Жалобы</span>
                        <i class="fa-solid fa-envelope-open-text ms-auto d-none d-sm-inline me-2 fa-users icon py-2"></i>
                    </div>
                    <div class="card-footer py-3 d-flex">
                        <a class="nav-link" href="#">Подробнее</a>
                        <span class="ms-auto">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
