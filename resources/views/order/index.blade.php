@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказы</h1>
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
                            <a href="{{route('orders.create')}}">Добавить новый заказ</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Products</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>
                                            @if($order->status == 0)
                                                Собирается
                                            @elseif($order->status == 1)
                                                Передано в доставку
                                            @else
                                                Доставлено
                                            @endif
                                        </td>
                                        <td>{{$order->address}}</td>
                                        <td>
                                            @foreach($order->products as $product)
                                                {{$product->title}} {{$order->countProduct($product->id)->quantity}}<br>
                                            @endforeach
                                            <a href="{{route('orders.add_product_view', $order)}}"><i class="fas fa-plus-square"></i></a>
                                        </td>

                                        <td><a class="btn btn-outline-success" href="{{route('orders.edit', $order->id)}}">Edit</a></td>
                                        <td>
                                            <form action="{{route('orders.destroy', $order->id)}}" method="post">
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
