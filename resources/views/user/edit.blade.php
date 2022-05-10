@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя {{$user->email}}</h1>
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
            <div class="ml-2">
                <form action="{{route('users.update', $user)}}" method="post" class="mb-4">
                    @csrf
                    @method('patch')

                    @if ($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="form-group mr-2">
                            <label>Имя*</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Введите имя">
                        </div>
                        <div class="form-group mr-2">
                            <label>Фамилия</label>
                            <input type="text" class="form-control" name="surname" value="{{$user->surname}}" placeholder="Введите фамилию">
                        </div>
                        <div class="form-group mr-2">
                            <label>Отчество</label>
                            <input type="text" class="form-control" name="patronymic" value="{{$user->patronymic}}" placeholder="Введите отчество">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mr-2">
                            <label>Возраст</label>
                            <input type="number" class="form-control" name="age" value="{{$user->age}}" placeholder="Введите свой возраст">
                        </div>
                        <div class="form-group">
                            <label>Пол*</label>
                            <select class="form-control" name="gender">
                                <option value="1">Мужской</option>
                                <option value="2" {{($user->gender == 2)? 'selected':''}}>Женский</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label>Адрес проживания</label>
                            <input type="text" class="form-control" name="address" value="{{$user->address}}" placeholder="Введите свой адрес">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
