@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование товара {{$product->title}}</h1>
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
                <form action="{{route('products.update', $product->id)}}" method="post" class="col-5" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label>Наименование товара</label>
                        <input type="text" value="{{$product->title}}" class="form-control" name="title" placeholder="Введите название товара">
                    </div>

                    <div class="form-group">
                        <label>Описание товара</label>
                        <textarea name="description" class="form-control">{{$product->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Загрузите изображение товара</label>
                        <input class="form-control" type="file" name="preview_image">
                    </div>
                    <div>
                        <label>Предыдущее превью</label>
                        <img src="{{asset('storage/'.$product->preview_image)}}" width="150px">
                    </div>


                    <div class="form-group">
                        <label>Цена(в рублях)</label>
                        <input value="{{$product->price}}" type="text" class="form-control" name="price" placeholder="Введите цену">
                    </div>
                    <div class="form-group">
                        <label>Количество на складе</label>
                        <input type="number" value="{{$product->quantity}}" class="form-control" name="quantity"
                               placeholder="Введите кол-во товара на складе">
                    </div>

                    <div class="form-group">
                        <label>Категория</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $product->category_id?'selected':''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Тэги</label>
                        <select class="tags" name="tags[]" multiple="" data-placeholder="Select a tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" {{in_array($tag->id,
                                    $product->tags->pluck('id')->toArray())?'selected':''}}>{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Видимость</label>
                        <select name="is_published" class="form-control">
                            <option value="1" {{$product->is_published?'selected':''}}>Опубликован</option>
                            <option value="0">Скрыт</option>
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
