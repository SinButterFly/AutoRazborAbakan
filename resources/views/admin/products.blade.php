@extends('layout')

@section('content')
    <div class="container">
        <h1>Управление товарами</h1>

        <form enctype="multipart/form-data" class="form-panel" action="/panel/product" method="post">
            @csrf
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
                <input type="file" class="form-control-file" id="productPhoto" name="photo">
            </div>

            <div class="form-group">
                <label for="productName">Наименование</label>
                <input type="text" class="form-control" id="productName" name="name">
            </div>

            <div class="form-group">
                <label for="productVendorCode">Артикул</label>
                <input type="text" class="form-control" id="productVendorCode" name="vendor_code">
            </div>

            <div class="form-group">
                <label for="productDescription">Описание</label>
                <input type="text" class="form-control" id="productDescription" name="description">
            </div>

            <div class="form-group">
                <label for="productPrice">Цена</label>
                <input type="text" class="form-control" id="productPrice" name="price">
            </div>

            <div class="form-group">
                <label for="productCount">Количество</label>
                <input type="number" class="form-control" id="productCount" name="count" value="1">
            </div>

            <input type="submit" class="form-btn_send" value="Создать">
        </form>

        <h2>Список товаров</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Марка</th>
                <th>Модель</th>
                <th>Категория</th>
                <th>Наименование</th>
                <th>Артикул</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->brand['brand']}}</td>
                    <td>{{$product->model['model']}}</td>
                    <td>{{$product->category['category']}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->vendor_code}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->count}}</td>
                    <td><a href="{{route('edit_product')}}?id={{$product->id}}">Редактировать</a></td>
                    <td><a href="{{route('delete_product')}}?id={{$product->id}}">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
