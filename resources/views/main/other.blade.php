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
                            <form action="{{ route('other.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="titleId" class="form-label text-muted">Тема</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleId" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="descrId" class="form-label text-muted">Описание</label>
                                    <textarea class="form-control @error('descr') is-invalid @enderror" id="descrId" rows="8" name="descr">{{ old('descr') }}</textarea>
                                    @error('descr')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted small">Приоритет</label>
                                    <select class="form-select @error('priority_id') is-invalid @enderror" name="priority_id" aria-label="Default select example">
                                        <option selected disabled>Выбрать</option>
                                        @foreach ($priorities as $priority)
                                            <option value="{{ $priority->id }}" {{$priority->id == old('priority_id') ? ' selected' : ''}}>{{ $priority->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('priority_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="formFileMultiple" class="form-label">Вложение (не обязательно)</label>
                                    <input class="form-control" type="file" name="files[]" id="formFileMultiple" multiple >
                                    @error('files*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
