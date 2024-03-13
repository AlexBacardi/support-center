@extends('layouts.admin_main')
@section('title', 'Название заявки')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 mb-3">
                <h4>Название заявки </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="row mb-5">
                    <div class="col-12 col-md-10 col-xl-6">
                        <div class="d-flex align-items-start">
                            <img class="avatar avatar-48 bg-light rounded-circle text-white p-1 d-none d-md-inline" src="{{  asset('build/img/avatars/avatar.png')  }}">
                            <div class="form-floating w-100 ms-1">
                                <textarea class="form-control @error('message') is-invalid @enderror" id="floatingTextarea" form="request-form" name="message"></textarea>
                                <label for="floatingTextarea">Ответить...</label>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <form action="#" method="POST" enctype="multipart/form-data" id="request-form">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label text-muted small">Прикрепить файлы</label>
                                        <input class="form-control form-control-sm" type="file" id="formFileMultiple" name="files[]" multiple>
                                    </div>
                                    @error('files*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
                                    <button type="reset" class="btn btn-primary btn-sm">Отмена</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ps-md-3">
                    <div class="col-12 col-md-10 col-lg-10 col-xl-8">
                        <p class="m-0 text-muted">Активность</p>
                        <hr>

                    </div>
                </div>
                <div class="row ps-md-3">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-8">
                        комментарии
                    </div>
                </div>
                <div class="row ps-md-3 mb-3">
                    <div class="col-12 col-md-10 col-lg-10 col-xl-8">
                        <hr class="my-3">
                        <p class="m-0 fw-medium small mb-3">Подробности <span class="small text-muted">12/03/2024 14:30 </span></p>
                        <p class="m-0 text-muted small">Описание</p>
                        <p class="mt-1">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit fugit vero labore laudantium expedita est, dignissimos odio nisi animi assumenda magnam, quidem rerum nam non ducimus, fuga debitis minima molestias.
                        </p>
                        <p class="text-muted small mb-0">Приоритет</p>
                        <p class="small">Medium</p>
                        <hr class="mt-3">
                    </div>
                </div>
                <div class="row ps-md-3">
                    <div class="col-7 col-md-5 col-lg-3">
                        <form action="#" method="POST">
                            <label class="form-label">Действия</label>
                            <select class="form-select mb-3" name="priority_id" aria-label="Default select example">
                                <option selected disabled>Выбрать</option>
                                    <option value="">Закрыть</option>
                                    <option value="">Открыть</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
