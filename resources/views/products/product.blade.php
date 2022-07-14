@extends('layout')

@section('content')
<section>
    <div class="container">
        @foreach($products as $product)
            <div class="product-more">
                <h2>{{$product->name}} для {{$product->brand['brand']}} {{$product->model['model']}}</h2>
                <div class="product-more_block row">
                    <div class="product-more_photo col-5">
                        <img src="{{$product->photo}}" alt="{{$product->name}}">
                    </div>

                    <div class="product-more_text col-7">
                        <h3>Характеристки</h3>
                        <ul>
                            <li>VIN-код: {{$product->vendor_code}}</li>
                            <li>Марка: {{$product->brand['brand']}}</li>
                            <li>Модель: {{$product->model['model']}}</li>
                            <li>Категория: {{$product->category['category']}}</li>
                            <li>Количество: {{$product->count}}</li>
                            <li>Описание: {{$product->description}}</li>
                            <li>Цена: {{$product->price}}</li>
                        </ul>

                        <form action="{{route('cart.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <input type="submit" class="form-btn_send" value="Добавить в корзину">
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</section>
@endsection
