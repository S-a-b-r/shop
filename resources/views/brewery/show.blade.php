@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пивоварня {{$brewery->title}}</h1>
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
                                        <td>{{$brewery->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{$brewery->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td class="overflow-auto" style="max-width: 200px">{{$brewery->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td class="overflow-auto" style="max-width: 200px">{{$brewery->country}}</td>
                                    </tr>
                                    <tr>
                                        <td>Logo</td>
                                        <td><img src="{{asset('storage/'.$brewery->logo)}}" width="200px"></td>
                                    </tr>

                                    <tr>
                                        <td><a class="btn btn-outline-success" href="{{route('breweries.edit', $brewery->id)}}">Edit</a></td>
                                        <td>
                                            <form action="{{route('breweries.destroy', $brewery->id)}}" method="post">
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
