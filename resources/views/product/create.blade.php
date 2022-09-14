@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание нового продукта</h1>
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
                    <form action="{{route('products.store')}}" method="post" class="col-5" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Наименование товара</label>
                            <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Введите название товара">
                        </div>
                        <div class="form-group">
                            <label>Описание товара</label>
                            <textarea name="description" class="form-control">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea name="content" class="form-control">{{old('content')}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Загрузите превью товара</label>
                            <input class="form-control" type="file" name="preview_image">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Загрузите изображение товара</label>
                            <input class="form-control" type="file" name="product_images[]">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Загрузите изображение товара</label>
                            <input class="form-control" type="file" name="product_images[]">
                        </div>


                        <div class="form-group">
                            <label>Цена(в рублях)</label>
                            <input value="{{old('price')}}" type="text" class="form-control" name="price" placeholder="Введите цену">
                        </div>
                        <div class="form-group">
                            <label>Количество на складе</label>
                            <input type="number" value="{{old('quantity')}}" class="form-control" name="quantity"
                                   placeholder="Введите кол-во товара на складе">
                        </div>

                        <div class="form-group">
                            <label>Категория</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == old('category_id')?'selected':''}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Тэги</label>
                            <select class="tags" name="tags[]" multiple="" data-placeholder="Select a tag" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}" {{(is_array(old('tags')) &&
                                        in_array($tag->id, old('tags')))?'selected':''}}>{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Цвета</label>
                            <select class="colors" name='colors[]' multiple="multiple" data-placeholder="Select a color"
                                    style="width: 100%;"  tabindex="-1" aria-hidden="true">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}" {{(is_array(old('colors')) &&
                                        in_array($color->id, old('colors')))?'selected':''}}>
                                        {{$color->title}}
                                    </option>
                                @endforeach
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


                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
