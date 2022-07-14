@extends('layout')

@section('content')

    <section>
        <div class="container">
            @foreach($orders as $order)
                <h1>Заказ №{{$order->id}}</h1>

                <h2>Покупатель {{$order->name}}</h2>
                <p>Телефон: {{$order->phone}}</p>

                <h2>Товары</h2>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Цена</th>
                        <th>Артикул</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)

                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->vendor_code}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </section>

@endsection
