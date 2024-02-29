@extends('layouts.main')
@section('title', 'Изменить пароль')
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
                                    <p class="profile-edit-subtitle">{{ $user->profile->company_name ?? '------' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="mb-2">
                                <p class="m-0 text-muted mb-2 small">Новый пароль</p>
                                <div class="mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleFormControlInput1" placeholder="Новый пароль" form="formUpdatePassword">
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="m-0 text-muted mb-2 small">Повторите пароль</p>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password_confirmation" id="exampleFormControlInput1" placeholder="Подтверждение пароля" form="formUpdatePassword">
                                </div>
                            </div>
                            <div class="mb-3">
                                <form action="{{ route('profiles.update-password', $user) }}" method="POST" enctype="multipart/form-data" id="formUpdatePassword">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <p class="m-0">Параметры</p>
                            <p class="m-0"><a href="{{ url()->previous() }}">Назад</a></p>
                            <p class="m-0"><a href="{{ route('profiles.edit', $user) }}">Редактировать профиль</a></p>
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
