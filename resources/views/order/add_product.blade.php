@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление товара к заказу {{$order->id}}</h1>
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
                    <form action="{{route('orders.add_product')}}" method="post" class="col-5">
                        @csrf
                        <input name="id_order" value="{{$order->id}}" hidden>
                        <div class="form-group">
                            <label>Выберите товар</label>
                            <select class="product" data-placeholder="Select a product" style="width: 100%;" tabindex="-1" aria-hidden="true" name="id_product">
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->title}}(на складе: {{$product->quantity}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Количество</label>
                            <input name="quantity" type="number" class="form-control" value="{{old('quantity')??1}}">
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
<script>
    import Index from "../../js/views/main";
    export default {
        components: {Index}
    }
</script>
