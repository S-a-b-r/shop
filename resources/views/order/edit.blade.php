@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование заказа {{$order->title}}</h1>
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
            <div class="row ml-2">
                <form action="{{route('orders.update', $order)}}" method="post" class="col-5">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label>Выберите пользователя</label>

                        <select class="user" data-placeholder="Select a user" style="width: 100%;" tabindex="-1" aria-hidden="true" name="id_user">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{$user->id == $order->id_user?'selected':''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Адрес</label>
                        <textarea name="address" class="form-control">{{$order->address}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Статус заказа</label>
                        <select name="status" class="form-control">
                            <option value="2" {{$order->status == 2?'selected':''}}>Получен</option>
                            <option value="1" {{$order->status == 1?'selected':''}}>Отправлен</option>
                            <option value="0">Собирается</option>
                        </select>
                    </div>

                    @if ($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
