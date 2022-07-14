@extends('layout')

@section('content')

<section class="catalog-page">
    <div class="container">
        <h1>Каталог</h1>

        <div class="row">
            @foreach($brands as $brand)
                <div class="catalog-brand col-2">
                    <a href="{{ route('catalog.index', ['brand' => $brand->id]) }}"><img src="{{$brand->photo}}" alt="{{$brand->brand}}"></a>
                    <a href="{{ route('catalog.index', ['brand' => $brand->id]) }}"><p class="catalog-brand_name">{{$brand->brand}}</p></a>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
