@extends('layouts.main')
@section('title', 'Профиль')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="profile d-flex flex-column">
                    <div class="row align-items-center mb-3">
                        <div class="col-3 col-md-2 col-xl-1 p-0 text-lg-center profile-icon">
                            <img class="avatar avatar-64 bg-light rounded-circle text-white p-2" src="https://raw.githubusercontent.com/twbs/icons/main/icons/person-fill.svg">
                        </div>
                        <div class="col-9 col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('index') }}" class="profile-title">Центр поддержки</a>
                                </div>
                                <div class="col-12">
                                    <p class="profile-subtitle">Компания</p>
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
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2">Имя</p>
                                <p class="m-0">Название компании</p>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2">Отправлять уведомления на адрес</p>
                                <p class="m-0">example@mail.ru</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <p class="m-0">Параметры</p>
                            <p class="m-0"><a href="{{ route('cabinet.edit') }}">Редактировать профиль</a></p>
                            <p class="m-0"><a href="#">Изменить пароль</a></p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <p>&copy "ТелематикаНэт", {{ now()->Format('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
