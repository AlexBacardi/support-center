@extends('layouts.main')
@section('title', 'Редактировать профиль')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="profile-edit d-flex flex-column">
                    <div class="row align-items-center mb-3">
                        <div class="col-3 col-md-2 col-xl-1 p-0 text-lg-center profile-edit-icon">
                            <img class="avatar avatar-64 bg-light rounded-circle text-white p-2" src="https://raw.githubusercontent.com/twbs/icons/main/icons/person-fill.svg">
                        </div>
                        <div class="col-9 col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('index') }}" class="profile-edit-title">Центр поддержки</a>
                                </div>
                                <div class="col-12">
                                    <p class="profile-edit-subtitle">Компания</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <p class="m-0 text-muted small">Вход с помощью</p>
                            <p class="m-0">example@mail.ru</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="mb-4">
                                <p class="m-0 fw-medium">Мой профиль</p>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2">Аватар</p>
                                <img class="avatar avatar-64 bg-light rounded-circle text-white p-2" src="https://raw.githubusercontent.com/twbs/icons/main/icons/person-fill.svg">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Загрузить аватар</label>
                                    <input class="form-control form-control-sm" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2">Имя</p>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Имя">
                                </div>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2">Отправлять уведомления на адрес</p>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Куда отправлять уведомления">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <p class="m-0">Параметры</p>
                            <p class="m-0"><a href="{{ url()->previous()}}">Назад</a></p>
                            <p class="m-0"><a href="">Изменить пароль</a></p>
                        </div>
                    </div>
                    <div class="profile-edit-footer">
                        <p>&copy "ТелематикаНэт", {{ now()->Format('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
