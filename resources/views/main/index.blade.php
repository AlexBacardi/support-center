@extends('layouts.main')
@section('title', 'ТелематикаНэт')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="info">
                    <div class="row align-items-center mb-3">
                        <div class="col-2 col-md-1 info-logo">
                            <img src="{{ asset('build/img/logo/logo2.png')}}" alt="logo">
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 info-title">
                                    <a href="#">Центр поддержки</a>
                                </div>
                                <div class="col-12 info-subtitle">
                                    <p>ТелематикаНэт.рф</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 info-descr mb-4">
                            <p>Добро пожаловать! С помощью предоставленных опций можно создать запрос в ТелематикаНэт.рф</p>
                        </div>
                    </div>
                    <div class="row info-request align-items-center">
                        <div class="col-2 col-md-1 px-0 text-center">
                            <i class="fa-solid fa-wrench"></i>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 info-request-title">
                                    <a href="#">Техническая поддержка</a>
                                </div>
                                <div class="col-12 info-request-desc">
                                    Нужна помощь в установке, настройке или устранении неполадок? Выберите этот пункт, чтобы создать запрос.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row info-request align-items-center">
                        <div class="col-2 col-md-1 px-0 text-center">
                            <i class="fa-solid fa-rotate"></i>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 info-request-title">
                                    <a href="#">Другие вопросы</a>
                                </div>
                                <div class="col-12 info-request-desc">
                                    Не можете найти что то? Выберите этот вариант, и мы вам поможем.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-footer">
                        <p>&copy "ТелематикаНет", {{now()->Format('Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
