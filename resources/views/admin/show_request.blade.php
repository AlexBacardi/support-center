@extends('layouts.admin_main')
@section('title', 'Название заявки')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 mb-3">
                <h4>{{ $request->title }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="row mb-5">
                    <div class="col-12 col-md-10 col-xl-6">
                        <div class="d-flex align-items-start">
                            <img class="avatar avatar-48 bg-light rounded-circle text-white p-1 d-none d-md-inline" src="{{ is_null(auth()->user()->profile->avatar) ? asset('build/img/avatars/avatar.png') : asset('storage/' . auth()->user()->profile->avatar) }}">
                            <div class="form-floating w-100 ms-1">
                                <textarea class="form-control @error('message') is-invalid @enderror" id="floatingTextarea" form="request-form" name="message"></textarea>
                                <label for="floatingTextarea">Ответить...</label>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <form action="{{ route('servicedesk.comments.store', $request->id) }}" method="POST" enctype="multipart/form-data" id="request-form">
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
                        @if (count($comments) > 0)
                            @foreach ($comments as $comment)
                                <div class="active">
                                    <div class="request-answer">
                                        <div class="row align-items-center mb-2">
                                            <div class="col-2 col-md-1">
                                                <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="{{ is_null($comment->user->profile->avatar) ? asset('build/img/avatars/avatar.png') : asset('storage/' . $comment->user->profile->avatar) }}">
                                            </div>
                                            <div class="col-9">
                                                <p class="m-0 fw-medium small">{{ $comment->user->profile->company_name }} <span class="small text-muted">{{ $comment->created_at->isoFormat('DD / MMM / YY   OH:mm ') }}</span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-11 offset-1">
                                                <p>
                                                    {{ $comment->message }}
                                                </p>
                                                @foreach ($comment->files as $commentFile)
                                                    @if ($commentFile->extension == 'doc' || $commentFile->extension == 'docx' || $commentFile->extension == 'pdf')
                                                        <div class="mb-2">
                                                            <a href="{{ route('download.file', $commentFile) }}">{{ $commentFile->name }}</a>
                                                        </div>
                                                    @else
                                                        <div class="tiket-img mb-2">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#imgModalComment{{ $loop->iteration }}"><img src="{{ Storage::url("{$commentFile->path}") }}" alt="123123"></a>
                                                        </div>

                                                        <div class="modal fade" id="imgModalComment{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">image</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img class="img-fluid" src="{{ Storage::url("{$commentFile->path}") }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <hr class="mt-3">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row ps-md-3 mb-3">
                    <div class="col-12 col-md-10 col-lg-10 col-xl-8 px-0">
                        <div class="ms-5 ps-4">
                            <p class="m-0 fw-medium small mb-3">Подробности <span class="small text-muted">{{ $request->created_at->isoFormat('DD / MMM / YY   OH:mm ') }}</span></p>
                            <p class="m-0 text-muted small">Описание</p>
                            <p class="mt-1">
                                {{ $request->descr }}
                            </p>
                            @foreach ($files as $file)
                                @if ($file->extension == 'doc' || $file->extension == 'docx' || $file->extension == 'pdf')
                                    <div class="mb-2">
                                        <a href="{{ route('download.file', $file) }}">{{ $file->name }}</a>
                                    </div>
                                @else
                                    <div class="tiket-img border mb-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#imgModal{{ $loop->iteration }}"><img src="{{ Storage::url("{$file->path}") }}" alt="123123"></a>
                                    </div>

                                    <div class="modal fade" id="imgModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="{{ Storage::url("{$file->path}") }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <p class="text-muted small mb-0">Приоритет</p>
                            <p class="small">{{ $request->priority->title }}</p>
                        </div>
                        <hr class="mt-3">
                    </div>
                </div>
                <div class="row ps-md-3 mb-5">
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
