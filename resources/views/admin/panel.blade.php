@extends('layout')

@section('content')

<section>
    <div class="container">
        <h1>Панель администратора</h1>

        <div class="panel_buttons ">
            <a href="{{route('brands')}}" class="btn btn-info">Управление марками</a>
            <a href="{{route('models')}}" class="btn btn-info">Управление моделями</a>
            <a href="{{route('categories')}}" class="btn btn-info">Управление категориями</a>
            <a href="{{route('products')}}" class="btn btn-info">Управление товарами</a>
        </div>

        <div class="panel_orders">
            <h2>Заказы пользователей</h2>

            @foreach($orders as $order)
                <div class="panel_orders_order">
                    <a href="{{route('order.show')}}?id={{$order->id}}">Заказ №{{$order->id}}</a>
                </div>
            @endforeach
            {{ $orders->links() }}
        </div>
    </div>
</section>

@endsection
