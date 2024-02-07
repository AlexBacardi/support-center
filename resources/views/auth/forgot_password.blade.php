@extends('layouts.main')
@section('title', 'восстановление пароля')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card form-fogot-password">
                <div class="card-header">{{ __('Восстановление пароля') }}</div>

                <div class="card-body mt-4">
                    @if ($message = session()->pull('status'))
                        <div class="alert alert-success mb-3 text-center">{{ $message }}</div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Почтовый адрес') }}</label>

                            <div class="col-md-6 mb-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Получить ссылку') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>&copy "ТелематикаНет", {{now()->Format('Y')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

