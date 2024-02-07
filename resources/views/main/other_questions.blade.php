@extends('layouts.main')
@section('title', 'Другие вопросы')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="form-other d-flex flex-column">
                    <div class="row align-items-center mb-3">
                        <div class="col-2 col-md-2 col-xl-1 pe-0 form-other-icon">
                            <i class="fa-solid fa-rotate"></i>
                        </div>
                        <div class="col-10 col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">ТелематикаНэт</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-12">
                                    <p class="form-other-title">Другие вопросы</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label text-muted">Тема</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label text-muted">Описание</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div>
                                    <label for="formFileMultiple" class="form-label">Вложение (не обязательно)</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-sm">Создать</button>
                                    <a href="{{ url()->previous()}}" class="btn btn-primary btn-sm">Назад</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-other-footer">
                        <p>&copy "ТелематикаНэт", {{ now()->Format('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
