@extends('layout')

@section('content')
    <section>
        <div class="container">
            <h1>Корзина</h1>
            @if( session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Cart::count() > 0)
                <h2>{{Cart::count()}} товаров в корзине</h2>

                <div class="row justify-content-between">
                    <div class="user-cart col-9">
                        @foreach(Cart::content() as $item)
                            <div class="user-cart_block row justify-content-between align-items-center">
                                <div class="user-cart_photo col-3">
                                    <a href="{{route('product_more', $item->model['slug'])}}?id={{$item->model['id']}}">
                                        <img src="{{ $item->model['photo'] }}" alt="Товар">
                                    </a>
                                </div>
                                <div class="user-cart_text col-5">
                                    <a href="{{route('product_more', $item->model['slug'])}}?id={{$item->model['id']}}">{{$item->model['name']}}</a>
                                    @php
                                        $desc = explode(';', $item->model['description'])
                                    @endphp
                                    @foreach($desc as $paragraph)
                                        <p class="user-cart_text_paragraph">{{$paragraph}}</p>
                                    @endforeach
                                </div>
                                <div class="user-cart_buttons col-2">
                                    <form action="{{route('cart.destroy', $item->rowId)}}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="form-btn_send" value="Удалить">
                                    </form>
                                </div>
                                <div class="user-cart_price col-2">
                                    <p>{{$item->model['price']}} руб.</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-3">
                        <h3>Оформить заказ</h3>
                        <div class="user-cart_total mb-4">
                            <p>Сумма: <b>{{Cart::subtotal()}} руб.</b></p>
                        </div>
                        <form action="{{route('order.store')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="orderName">Имя</label>
                                <input class="form-control" type="text" id="orderName" name="name" placeholder="Введите имя" required>
                            </div>
                            <div class="form-group row">
                                <label for="orderPhone">Телефон</label>
                                <input class="form-control" type="text" id="orderPhone" name="phone" placeholder="Ввеедите номер телефона" required>
                            </div>
                            @if ($errors->any())

                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <input type="submit" class="form-btn_send" value="Создать заказ">
                        </form>
                    </div>
                </div>


            @else

                <h3>В корзине нет товаров!</h3>
                <a href="{{ route('catalog') }}" class="form-btn_send">Вернуться в каталог</a>

            @endif

        </div>
    </section>
<script>
    window.addEventListener("DOMContentLoaded", function() {
        [].forEach.call( document.querySelectorAll('#orderPhone'), function(input) {
            let keyCode;
            function mask(event) {
                event.keyCode && (keyCode = event.keyCode);
                let pos = this.selectionStart;
                if (pos < 3) event.preventDefault();
                let matrix = "+7 (___) ___ ____",
                    i = 0,
                    def = matrix.replace(/\D/g, ""),
                    val = this.value.replace(/\D/g, ""),
                    new_value = matrix.replace(/[_\d]/g, function(a) {
                        return i < val.length ? val.charAt(i++) || def.charAt(i) : a
                    });
                i = new_value.indexOf("_");
                if (i != -1) {
                    i < 5 && (i = 3);
                    new_value = new_value.slice(0, i)
                }
                let reg = matrix.substr(0, this.value.length).replace(/_+/g,
                    function(a) {
                        return "\\d{1," + a.length + "}"
                    }).replace(/[+()]/g, "\\$&");
                reg = new RegExp("^" + reg + "$");
                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
                if (event.type == "blur" && this.value.length < 5)  this.value = ""
            }

            input.addEventListener("input", mask, false);
            input.addEventListener("focus", mask, false);
            input.addEventListener("blur", mask, false);
            input.addEventListener("keydown", mask, false)

        });

    });
</script>
@endsection
