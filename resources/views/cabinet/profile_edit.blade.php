@extends('layouts.main')
@section('title', 'Редактировать профиль')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="profile-edit d-flex flex-column">
                    <div class="row align-items-center mb-3">
                        <div class="col-3 col-md-2 col-xl-1 p-0 text-lg-center profile-edit-icon">
                            <img class="avatar avatar-64 bg-light rounded-circle text-white p-2" src="{{ is_null($user->profile->avatar) ? asset('build/img/avatars/avatar.png') : asset('storage/' . $user->profile->avatar) }}">
                        </div>
                        <div class="col-9 col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('index') }}" class="profile-edit-title">Центр поддержки</a>
                                </div>
                                <div class="col-12">
                                    <p class="profile-edit-subtitle m-0">{{ $user->profile->company_name ?? '------' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <p class="m-0 text-muted small">Вход с помощью</p>
                            <p class="m-0">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="mb-4">
                                <p class="m-0 fw-medium">Мой профиль</p>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2">Аватар</p>
                                <img class="avatar avatar-64 bg-light rounded-circle text-white p-2" src="{{ is_null($user->profile->avatar) ? asset('build/img/avatars/avatar.png') : asset('storage/' . $user->profile->avatar) }}">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Загрузить аватар</label>
                                    <input class="form-control form-control-sm" type="file" name="avatar" id="formFile" form="formProfile">
                                    @error('avatar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2">Название компании</p>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="company_name" id="exampleFormControlInput1" placeholder="Название компании" form="formProfile" value="{{ $user->profile->company_name }}">
                                </div>
                                @error('company_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <form action="{{ route('profiles.update', $user) }}" method="POST" enctype="multipart/form-data" id="formProfile">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <p class="m-0">Параметры</p>
                            <p class="m-0"><a href="{{ url()->previous() }}">Назад</a></p>
                            <p class="m-0"><a href="{{ route('profiles.update-password', $user) }}">Изменить пароль</a></p>
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
