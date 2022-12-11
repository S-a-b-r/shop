@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание нового заказа</h1>
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
                    <form action="{{route('orders.store')}}" method="post" class="col-5" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Выберите пользователя</label>
                            <select class="user" data-placeholder="Select a user" style="width: 100%;" tabindex="-1" aria-hidden="true" name="id_user">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" {{$user->id == old('id_user')?'selected':''}}>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Адрес</label>
                            <textarea name="address" class="form-control">{{old('address')}}</textarea>
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

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
