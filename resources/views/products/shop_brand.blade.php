@extends('layout')

@section('content')

    <section class="catalog-page">
        <div class="container">
            <h1>Каталог</h1>
            <div class="catalog row">

                <div class="side-bar col-3">
                    <form action="{{ URL::current() }}" method="get">
                        <h3>Фильтр</h3>
                        @foreach($categories as $category)
                            @php
                                $checked = [];
                                if (isset($_GET['category'])){
                                    $checked = $_GET['category'];
                                }
                            @endphp
                            <div class="filter-category">
                                <input type="checkbox" id="filterCategory" name="category[]" value="{{ $category->id }}"
                                @if(in_array($category->id, $checked)) checked @endif
                                />
                                <label for="filterCategory">{{$category->category}}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="form-btn_send">Применить</button>
                    </form>
                </div>

                <main class="products-list col-9">
                    <h2>Каталог товаров</h2>
                    <div class="catalog_items row">
                        @foreach($products as $product)
                            <div class="card col-4">
                                <div class="card-img_wrap">
                                    <img class="card-img-top" src="{{$product->photo}}" alt="product">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p>{{$product->price}} руб.</p>
                                    <a href="{{route('product_more')}}?id={{$product->id}}" class="btn btn-primary">Подробнее</a>
                                    <p><small>{{$product->brand['brand']}}/{{$product->model['model']}}</small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="paginate">
                        {{ $products->links() }}
                    </div>
                </main>

            </div>

        </div>
    </section>

@endsection
