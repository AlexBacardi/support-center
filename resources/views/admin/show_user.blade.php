@extends('layouts.admin_main')
@section('title', 'Информация о пользователе')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 mb-3">
                <h4>Имя компании</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4 mb-3">
                <div class="card h-100">
                    <div class="card-body pb-2 pt-0 px-1 px-md-3 d-flex flex-column mt-3">
                        <div class="d-flex ">
                            <p class="w-50">Id</p>
                            <p>1</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">имя</p>
                            <p class="w-50">alex</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Компания</p>
                            <p class="w-50">Сервис-нафта</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Аватар</p>
                            <p class="w-50">аватар</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Почта</p>
                            <p class="w-50">mirox1999@mail.ru</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Дата рег.</p>
                            <p class="w-50">12.12.2023</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Обращения</p>
                            <p class="w-50">35</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Жалобы</p>
                            <p class="w-50">12</p>
                        </div>
                        <div class="d-flex">
                            <p class="w-50">Статус</p>
                            <p class="w-50">Активен</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="w-50 m-0">Блок до:</p>
                            <input class="w-50 form-control" type="date">
                        </div>
                        <div class="d-flex my-4">
                            <form action="#" method="post" class="w-50">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
