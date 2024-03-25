@extends('layouts.admin_main')
@section('title', 'Редактировать пользователя')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 mb-3">
                <h4>{{ $user->profile->company_name ?? '-----' }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-2 pt-0 px-1 px-md-3 d-flex flex-column mt-3">
                        <div class="d-flex ">
                            <p class="w-50">Id</p>
                            <p>{{ $user->id }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <p class="w-50 m-0">имя</p>
                            <input type="text" class="form-control w-50" name="name" placeholder="Имя" value="{{ $user->name }}" form="adminFormProfile">
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <p class="w-50 m-0">Компания</p>
                            <input type="text" class="form-control w-50" name="company_name" placeholder="Название компании" value="{{$user->profile->company_name}}" form="adminFormProfile">
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <p class="w-50">Аватар</p>
                            <p class="w-50"><img class="avatar avatar-64 bg-light rounded-circle text-white p-2" src="{{ is_null($user->profile->avatar) ? asset('build/img/avatars/avatar.png') : asset('storage/' . $user->profile->avatar)}}"></p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <p class="w-50 m-0">Загрузить аватар</p>
                            <input class="form-control form-control-sm w-50" type="file" name="avatar" form="adminFormProfile">
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Почта</p>
                            <p class="w-50">{{ $user->email }}</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Дата рег.</p>
                            <p class="w-50">{{ $user->created_at->format('d-m-Y') }}</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Обращения</p>
                            <p class="w-50">{{ $user->requests()->count()}}</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Жалобы</p>
                            <p class="w-50 text-danger">12</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Статус</p>
                            <p class="w-50 text-{{status($user->banned_until)? 'success' : 'danger'}}">{{status($user->banned_until)? 'Активен' : 'Заблокирован' }}</p>
                        </div>
                        @if (!status($user->banned_until))
                        <div class="d-flex align-items-center">
                            <p class="w-50">Заблокирован до</p>
                            <p class="w-50 text-danger">{{ $user->banned_until->format('d-m-Y') }}</p>
                        </div>
                        @endif
                        <div class="d-flex align-items-center mb-3">
                            <p class="w-50 m-0">Роль</p>
                            <select class="form-select w-50" name="role_id" form="adminFormProfile">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{$user->role_id == $role->id ? ' selected' : ''}}>{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="w-50 m-0">Блок до:</p>
                            <input class="w-50 form-control" type="date" name="banned_until" form="adminFormProfile">
                        </div>
                        <div class="d-flex my-4">
                            <form action="{{ route('admin.users.update', $user)}}" method="POST" class="w-75" enctype="multipart/form-data" id="adminFormProfile">
                                @csrf
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Назад</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
