@extends('layouts.main')
@section('title', 'Запрос')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">
                <div class="request-show">
                    <div class="row align-items-center mb-3">
                        <div class="col-2 col-xl-1 text-center reqest-show-icon">
                            @if ($request->type_id == 1)
                                <i class="fa-solid fa-wrench"></i>
                            @else
                                <i class="fa-solid fa-rotate"></i>
                            @endif
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
                                    <p class="tiket-title">{{ $request->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="row request-show-message">
                                <div class="col-2 col-md-1">
                                    <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="https://raw.githubusercontent.com/twbs/icons/main/icons/person-fill.svg">
                                </div>
                                <div class="col-9 px-2 ms-3 ms-md-2">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea" form="request-form" name="message"></textarea>
                                        <label for="floatingTextarea" >Прокоментировать запрос...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row request-show-form">
                                <div class="col-10 col-md-8 offset-1">
                                    <form action="{{ route('servicedesk.comments.store', $request->id)}}" method="POST" enctype="multipart/form-data" id="request-form">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label text-muted">Прикрепить файлы</label>
                                            <input class="form-control form-control-sm" type="file" id="formFileMultiple" name="files[]" multiple>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
                                        <button type="reset" class="btn btn-primary btn-sm">Отмена</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row mb-2 px-3">
                                <div class="col-12">
                                    <p class="m-0 text-muted">Активность</p>
                                </div>
                                <hr>
                            </div>
                            @if (count($comments) > 0)
                                @foreach ($comments as $comment)
                                    <div class="active">
                                        <div class="request-answer">
                                            <div class="row align-items-center mb-2">
                                                <div class="col-2 col-md-1">
                                                    <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="https://raw.githubusercontent.com/twbs/icons/main/icons/person-fill.svg">
                                                </div>
                                                <div class="col-9">
                                                    <p class="m-0 fw-medium small">Компания <span class="small text-muted">{{ $comment->created_at->isoFormat('DD / MMM / YY   OH:mm ') }}</span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-11 offset-1">
                                                    <p>
                                                        {{ $comment->message }}
                                                    </p>
                                                    <!--
                                                    <div class="tiket-img mb-1">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgModal"><img src="{{ asset('img/23.jpg') }}" alt=""></button>
                                                    </div>
                                                    <div class="tiket-img mb-1">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#imgModal1"><img src="{{ asset('img/image-2023-08-30-10-58-52-962.png') }}" alt=""></button>
                                                    </div> -->

                                                    <!-- Modal -->
                                                    {{--TODO сделать модальные окна  --}}
                                                    <!--<div class="modal fade" id="imgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: auto">
                                                        <div class="modal-dialog  modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">image</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center" style="width: auto">
                                                                    <img src="{{ asset('img/23.jpg') }}" alt="" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="imgModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: auto">
                                                        <div class="modal-dialog  modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">image</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center" style="width: auto">
                                                                    <img src="{{ asset('img/image-2023-08-30-10-58-52-962.png') }}" alt="" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <hr class="mt-3">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="request-answer">
                                <div class="row align-items-center mb-2">

                                    <div class="col-9 offset-1">
                                        <p class="m-0 fw-medium small">Подробности <span class="small text-muted">{{ $request->created_at->isoFormat('DD / MMM / YY   OH:mm ') }}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11 offset-1">
                                        <p class="m-0 text-muted small">Описание</p>
                                        <p>
                                            {{ $request->descr }}
                                        </p>
                                        @foreach ($files as $file)
                                            @if ($file->extension == 'doc' || $file->extension == 'docx' || $file->extension == 'pdf')
                                                <a href="{{ Storage::url($file->path) }}" download>{{ $file->name }}</a>
                                            @else
                                                <div class="tiket-img mb-1">
                                                    <img src="{{ asset('build/img/logo/logo.png') }}" alt="1231">
                                                    <img src="{{ Storage::url($file->path) }}" alt="1231">
                                                </div>
                                            @endif
                                        @endforeach
                                        <p class="text-muted small mb-0">Приоритет</p>
                                        <p class="small">{{ $request->priority->title }}</p>
                                    </div>
                                    <hr class="mt-3">
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="row request-show-action">
                                <div class="col-12">
                                    <span class="badge text-bg-secondary">WAITING FOR SUPPORT</span>
                                </div>
                                <div class="col-12">
                                    <i class="fa-regular fa-eye"></i><a href="#">Не уведомляйте меня</a>
                                </div>
                                <div class="col-12">
                                    <i class="fa-solid fa-right-to-bracket"></i><a href="#">Пожаловаться</a>
                                </div>
                                <div class="col-12">
                                    <i class="fa-solid fa-right-to-bracket"></i><a href="#">Решить задачу</a>
                                </div>
                                <div class="col-12">
                                    <i class="fa-solid fa-right-to-bracket"></i><a href="#">Закрыть обращение</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="fw-medium">передано</p>
                                </div>
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-2 p-0 text-center">
                                            <img class="avatar avatar-32 bg-light rounded-circle text-white p-1" src="https://raw.githubusercontent.com/twbs/icons/main/icons/person.svg">
                                        </div>
                                        <div class="col-10 ps-3">
                                            <p class="m-0 fw-medium">Телематика</p>
                                            <p class="m-0"><span class="small text-muted">инициатор</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reuqest-show-footer">
                            <p>&copy "ТелематикаНэт", {{ now()->Format('Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
