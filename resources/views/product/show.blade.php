@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Товар {{$product->title}}</h1>
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
                                        <td>{{$product->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{$product->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td class="overflow-auto" style="max-width: 200px">{{$product->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Content</td>
                                        <td class="overflow-auto" style="max-width: 200px">{{$product->content}}</td>
                                    </tr>
                                    <tr>
                                        <td>Preview image</td>
                                        <td><img src="{{asset('storage/'.$product->preview_image)}}" width="200px"></td>
                                    </tr>
                                    <tr>
                                        <td>Images</td>
                                        <td>
                                        @foreach($product->images as $image)
                                        <img src="{{asset('storage/'.$image->file_path)}}" width="200px">
                                        @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>{{$product->price}} руб</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td>{{$product->quantity}}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>{{$product->category->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tags</td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                {{$tag->title}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is published</td>
                                        <td>
                                            @if($product->is_published == 1)
                                                Опубликован
                                            @else
                                                Не опубликован
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><a class="btn btn-outline-success" href="{{route('products.edit', $product->id)}}">Edit</a></td>
                                        <td>
                                            <form action="{{route('products.destroy', $product->id)}}" method="post">
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
