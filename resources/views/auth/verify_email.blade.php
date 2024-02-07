@extends('layouts.main')
@section('title', 'Подтверждение почты')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card form-fogot-password">
                    <div class="card-header">{{ __('Подтверждение почты') }}</div>
                    @if ($message = session()->pull('message'))
                        <div class="alert alert-success my-3 text-center">{{ $message }}</div>
                    @endif
                    <div class="card-body mt-4 text-center">
                        <form class="d-inline" method="POST" action="{{ route('verification.send')}}">
                            @csrf
                            <p class="fw-medium">{{ __('Прежде чем продолжить, пожалуйста, подтвердите свою электронную почту.') }}</p>
                            <p class="fw-medium mb-4">{{ __('Если вы не получили электронное письмо, отправьте запрос еще раз') }}</p>
                            <button type="submit" class="btn btn-primary">{{ __('Подтвердить почту') }}</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>&copy "ТелематикаНет", {{ now()->Format('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
