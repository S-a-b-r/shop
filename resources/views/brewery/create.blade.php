@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление новой пивоварни</h1>
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
                    <form action="{{route('breweries.store')}}" method="post" class="col-5" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Название пивоварни</label>
                            <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Введите название пивоварни">
                        </div>
                        <div class="form-group">
                            <label>Описание пивоварни</label>
                            <textarea name="description" class="form-control">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Страна</label>
                            <input type="text" value="{{old('country')}}" class="form-control" name="country" placeholder="Введите страну пивоварни">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Загрузите логотип пивоварни</label>
                            <input class="form-control" type="file" name="logo">
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
