@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пивоварни</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('breweries.create')}}">Добавить новую пивоварню</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Logo</th>
                                        <th>Country</th>
                                        <th>Rating</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($breweries as $brewery)
                                    <tr>
                                        <td>{{$brewery->id}}</td>
                                        <td style="max-width: 150px; overflow-x: auto">
                                            <a href="{{route('breweries.show', $brewery)}}">{{$brewery->title}}</a>
                                        </td>
                                        <td style="max-width: 600px;">
                                            <div class="overflow-auto">{{$brewery->description}}</div>
                                        </td>
                                        <td>
                                            <img src="{{asset('storage/'.$brewery->logo)}}" width="150px">
                                        </td>
                                        <td>
                                            <p>{{$brewery->country}}</p>
                                        </td>
                                        <td>
                                            <p>{{$brewery->rating}}</p>
                                        </td>
                                        <td><a class="btn btn-outline-success" href="{{route('breweries.edit', $brewery->id)}}">Edit</a></td>
                                        <td>
                                            <form action="{{route('breweries.destroy', $brewery->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
