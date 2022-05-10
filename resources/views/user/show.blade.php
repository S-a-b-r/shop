@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь {{$user->email}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$user->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Имя</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Фамилия</td>
                                        <td>{{$user->surname}}</td>
                                    </tr>
                                    <tr>
                                        <td>Отчество</td>
                                        <td>{{$user->patronymic}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Пол</td>
                                        <td>{{$user->genderTitle}}</td>
                                    </tr>
                                    <tr>
                                        <td>Возраст</td>
                                        <td>{{$user->age}}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес</td>
                                        <td>{{$user->address}}</td>
                                    </tr>
                                    <tr>
                                        <td><a class="btn btn-outline-success" href="{{route('users.edit', $user)}}">Edit</a></td>
                                        <td>
                                            <form action="{{route('users.destroy', $user)}}" method="post">
                                                @csrf
                                                @method('delete')
                                               <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
