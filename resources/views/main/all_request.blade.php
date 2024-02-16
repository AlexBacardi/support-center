@extends('layouts.main')
@section('title', 'Запросы')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">
                <div class="request">
                    <div class="row align-items-center mb-3">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 request-title">
                                    <a href="{{ route('index') }}">Центр поддержки</a>
                                </div>
                                <div class="col-12 request-subtitle">
                                    <p>Запросы</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5 gy-2 align-items-center">
                        <div class="col-12 col-md-4">
                            <select class="form-select form-select-sm" aria-label="Default select example" form="form">
                                <option selected>Открытые запросы</option>
                                <option value="1">Закрые запросы</option>
                                <option value="2">Любой статус</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <select class="form-select form-select-sm" aria-label="Default select example" form="form">
                                <option selected>Любой тип запроса</option>
                                <option value="1">Техническая поддержка</option>
                                <option value="2">Другие запросы</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <form action="#" id="form">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="s" placeholder="Searching...." aria-label="Searching...." aria-describedby="button-search">
                                    <button class="btn btn-outline-primary btn-sm" type="submit" id="button-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="small">
                                            <td scope="col" class="text-muted">Тип</td>
                                            <td scope="col" class="d-none d-md-table-cell text-muted">Ссылка</td>
                                            <td scope="col" class="text-muted">Сводка</td>
                                            <td scope="col" class="d-none d-lg-table-cell text-muted">Service Desk</td>
                                            <td scope="col" class="text-muted text-center">Статус</td>
                                            <td scope="col" class="d-none d-lg-table-cell text-center text-muted">Инициатор запроса</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allUserRequest as $request)
                                            <tr>
                                                <td scope="row">
                                                    @if ($request->type_id == 1)
                                                        <i class="fa-solid fa-wrench"></i>
                                                    @else
                                                        <i class="fa-solid fa-rotate"></i>
                                                    @endif
                                                </td>
                                                <td class="d-none d-md-table-cell"><a href="{{ route('techical-support.show', $request->id) }}" class="ms-3">TT-{{ $request->id}}</a></td>
                                                <td><a href="{{ route('techical-support.show', $request->id) }}">{{ $request->title }}</a></td>
                                                <td class="d-none d-lg-table-cell">ТелеманикаНет</td>
                                                <td class="text-center small">{{ $request->status->title}}</td>
                                                <td class="d-none d-lg-table-cell text-center">Компания</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="reuqest-footer">
                        <p>&copy "ТелематикаНэт", {{ now()->Format('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
