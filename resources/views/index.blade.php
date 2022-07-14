@extends('layout')

@section('content')


<div class="slider">
    <div class="container">
        <div id="sliderMain" class="carousel slide" data-ride="carousel">

            <ul class="carousel-indicators">
                <li data-target="#sliderMain" data-slide-to="0" class="active"></li>
                <li data-target="#sliderMain" data-slide-to="1"></li>
                <li data-target="#sliderMain" data-slide-to="2"></li>
            </ul>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('img/slider-item_1.jpg')}}" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/slider-item_2.jpg')}}" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/slider-item_3.jpg')}}" alt="">
                </div>
            </div>

            <a class="carousel-control-prev" href="#sliderMain" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#sliderMain" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>

<section class="feedback-form">
    <div class="container">
        <h2>Свяжитесь с нами</h2>
        <form action="{{route('feedback')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="feedbackName" class="col-sm-2 col-form-label">Ваше имя:</label>
                <div class="col-sm-10">
                    <input type="text" name="user_name" class="form-control" id="feedbackName" placeholder="Введите имя">
                </div>
            </div>
            <div class="form-group row">
                <label for="feedbackEmail" class="col-sm-2 col-form-label">Ваша почта:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="feedbackEmail" placeholder="Введите электронную почту">
                </div>
            </div>
            <div class="form-group row">
                <label for="feedbackPhone" class="col-sm-2 col-form-label">Ваш телефон:</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="feedbackPhone" placeholder="Введите номер телефона">
                </div>
            </div>
            <div class="form-group">
                <label for="feedbackMessage">Сообщение:</label>
                <textarea class="form-control" id="feedbackMessage" name="text" placeholder="Сообщение..."></textarea>
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

            <div class="row justify-content-end" style="margin-right: 0">
                <input type="submit" class="main-button">
            </div>
        </form>
    </div>
</section>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        [].forEach.call( document.querySelectorAll('#feedbackPhone'), function(input) {
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
