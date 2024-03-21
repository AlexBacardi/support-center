@extends('layouts.admin_main')
@section('title', 'Обращения')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 mb-3">
                <h4>Обращения</h4>
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
                    <option selected disabled>Приоритет</option>
                    <option value="1">highest</option>
                    <option value="2">high</option>
                    <option value="2">medium</option>
                    <option value="2">low</option>
                    <option value="2">lowest</option>
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
        <div class="row">
            <div class="col-12">
                <div class="table-responsive-md">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">№</th>
                                <th scope="col">тип</th>
                                <th scope="col">Тема</th>
                                <th scope="col">Инициатор</th>
                                <th scope="col">Спутник</th>
                                <th scope="col">Site ID</th>
                                <th scope="col">Приоритет</th>
                                <th scope="col">Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <th class="text-center" scope="row">{{ $request->id }}</th>
                                    <td>
                                        @if ($request->type_id == 1)
                                            <i class="fa-solid fa-wrench"></i>
                                        @else
                                            <i class="fa-solid fa-rotate"></i>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.requests.show', $request )}}">{{ $request->title }}</a></td>
                                    <td>{{ $request->user->profile->company_name }}</td>
                                    <td>{{ $request->satellite->title ?? ''}}</td>
                                    <td>{{ $request->site_id ?? ''}}</td>
                                    <td>{{ $request->priority->title }}</td>
                                    <td>{{ $request->status->title}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
