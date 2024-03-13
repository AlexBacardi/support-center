@extends('layouts.admin_main')
@section('title', 'Пользователи')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 mb-3">
                <h4>Пользователи</h4>
            </div>
        </div>
        <div class="row mb-5 gy-2 align-items-center">
            <div class="col-12 col-md-4">
                <select class="form-select form-select-sm" aria-label="Default select example" form="form">
                    <option selected>Открытые запросы</option>
                    <option value="1">Закрые запросы</option>
                    <option value="2">Любой статус</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <select class="form-select form-select-sm" aria-label="Default select example" form="form">
                    <option selected disabled>Приоритет</option>
                    <option value="1">highest</option>
                    <option value="2">high</option>
                    <option value="2">medium</option>
                    <option value="2">low</option>
                    <option value="2">lowest</option>
                </select>
            </div>
            <div class="col-12 col-md-4">
                <form action="#" id="form">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="s" placeholder="Searching...." aria-label="Searching...." aria-describedby="button-search">
                        <button class="btn btn-outline-primary btn-sm" type="submit" id="button-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive-md">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">№</th>
                                <th scope="col">Имя</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Компания</th>
                                <th scope="col" class="w-25">Дата регистрации</th>
                                <th scope="col">Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td>alex</td>
                                <td>mirox@mail.ru</td>
                                <td>Сервис-Нафта</td>
                                <td class="w-25">10.12.2023</td>
                                <td>Активен</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">2</th>
                                <td>alex</td>
                                <td>mirox@mail.ru</td>
                                <td>Сервис-Нафта</td>
                                <td>10.12.2023</td>
                                <td>Активен</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">3</th>
                                <td>alex</td>
                                <td>mirox@mail.ru</td>
                                <td>Сервис-Нафта</td>
                                <td>10.12.2023</td>
                                <td>Активен</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">4</th>
                                <td>alex</td>
                                <td>mirox@mail.ru</td>
                                <td>Сервис-Нафта</td>
                                <td>10.12.2023</td>
                                <td>Активен</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
