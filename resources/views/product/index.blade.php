@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Товары</h1>
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
                            <a href="{{route('products.create')}}">Добавить новый товар</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Tags</th>
                                        <th>Category</th>
                                        <th>Colors</th>
                                        <th>IsPublished</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td style="max-width: 150px; overflow-x: auto">
                                            <a href="{{route('products.show', $product->id)}}">{{$product->title}}</a>
                                        </td>
                                        <td>
                                            <img src="{{asset('storage/'.$product->preview_image)}}" width="150px">
                                        </td>
                                        <td>{{$product->price}} руб</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                {{$tag->title}}
                                            @endforeach
                                        </td>
                                        <td>@if(isset($product->category->title)){{$product->category->title}}@endif</td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                {{$color->title}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($product->is_published == 1)
                                                Опубликован
                                            @else
                                                Не опубликован
                                            @endif
                                        </td>

                                        <td><a class="btn btn-outline-success" href="{{route('products.edit', $product->id)}}">Edit</a></td>
                                        <td>
                                            <form action="{{route('products.destroy', $product->id)}}" method="post">
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
