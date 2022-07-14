@extends('layout')

@section('content')
    <section>
        <div class="container">
            <h1>Управление товарами</h1>

            <h2>Редактировать товар</h2>
            <form enctype="multipart/form-data" class="form-panel" action="{{route('edit_product')}}" method="post">
                @csrf
                @foreach($products as $product)
                    <div class="form-group">
                        <label for="productBrand">Марка</label>
                        <select class="form-control" name="brand_id" id="productBrand">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productModel">Модель</label>
                        <select class="form-control" name="model_id" id="productModel">
                            @foreach($models as $model)
                                <option value="{{$model->id}}">{{$model->model}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productCategory">Категория</label>
                        <select class="form-control" name="category_id" id="productCategory">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productPhoto">Фотография</label>
                        <input type="file" class="form-control-file" id="productPhoto" name="photo" value="{{$product->photo}}">
                    </div>

                    <div class="form-group">
                        <label for="productName">Наименование</label>
                        <input type="text" class="form-control" id="productName" name="name" value="{{$product->name}}">
                    </div>

                    <div class="form-group">
                        <label for="productVendorCode">Артикул</label>
                        <input type="text" class="form-control" id="productVendorCode" name="vendor_code" value="{{$product->vendor_code}}">
                    </div>

                    <div class="form-group">
                        <label for="productDescription">Описание</label>
                        <input type="text" class="form-control" id="productDescription" name="description" value="{{$product->description}}">
                    </div>

                    <div class="form-group">
                        <label for="productPrice">Цена</label>
                        <input type="text" class="form-control" id="productPrice" name="price" value="{{$product->price}}">
                    </div>

                    <div class="form-group">
                        <label for="productCount">Количество</label>
                        <input type="number" class="form-control" id="productCount" name="count" value="{{$product->count}}">
                    </div>

                    <input type="submit" class="form-btn_send" value="Редактировать">
                @endforeach
            </form>
        </div>
    </section>
@endsection
