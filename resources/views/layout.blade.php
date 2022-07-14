<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Авторазбор Абакан</title>
<meta name="description" content="Авторазбор российских автомобилей в городе Абакан. Каталог автодетелей на продажу">
<meta name="keywords" content="Авторазбор Абакан, Авторазбор, Автозапчасти Абакан, Автозапчасти, Автодетали, б/у детали, Российские автозапчасти">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
<!-- Yandex.Metrika counter -->
<script>
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(80646778, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/80646778" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<!-- /Yandex.Metrika counter -->
<meta name="yandex-verification" content="d6681a3cdac38df4">
<div class="no-footer">
    <div class="top_info">
        <div class="container">
            <div class="row align-items-center">
                <p><i class="fa fa-phone"></i> +7 (983) 376-67-00</p>
                <p><i class="fa fa-home"></i> г.Абакан, ул.Катанова, дом 12</p>
                <p><i class="fa fa-envelope"></i> avtorazborabakan@gmail.com</p>
                <p><i class="fa fa-clock-o"></i> Пн - Пт с 08:00 до 20:00</p>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <div class="header-logo justify-content-between row">
                <div class="header-logo_img">
                    <img src="{{asset('img/logo.png')}}" alt="Logo">
                </div>
                <div class="header-logo_text">
                    <img src="{{asset('img/logo_name.png')}}" alt="Logo_sub">
                </div>
            </div>
        </div>
    </header>

    <div class="menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index_page')}}">Главная страница</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('catalog')}}">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contacts_page')}}">Контакты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about_us_page')}}">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart.index')}}">
                                Корзина
                                @if (Cart::instance('default')->count() > 0)
                                    <span class="cart-count">{{Cart::instance('default')->count()}}</span>
                                @endif
                            </a>
                        </li>
                        @auth()
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('panel_page')}}">Панель упаравления</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>


    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <div class="calc">
            <div class="row">
                <div class="col-3">
                    <div class="footer-logo">
                        <img src="{{asset('img/logo.png')}}" alt="Logo">
                    </div>
                </div>
                <div class="col-9 row justify-content-end">
                    <nav class="footer-navbar navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index_page')}}">Главная страница</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('catalog')}}">Каталог</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contacts_page')}}">Контакты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about_us_page')}}">О нас</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('cart.index')}}">
                                        Корзина
                                        @if (Cart::instance('default')->count() > 0)
                                            <span class="cart-count">{{Cart::instance('default')->count()}}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <p class="footer-phone"> +7 (983) 376-67-00</p>
                </div>
            </div>
            <div class="col-12 row justify-content-between m-0">
                <p class="footer-copyright">&copy; Центр авторазбора российских автомобилей 2021г.</p>
                <div class="footer-social">
                    <a href=""><img src="{{asset('img/social_icon/youtube.png')}}" alt=""></a>
                    <a href=""><img src="{{asset('img/social_icon/instagram.png')}}" alt=""></a>
                    <a href=""><img src="{{asset('img/social_icon/facebook.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="{{asset('js/slider.js')}}"></script>
<script src="{{asset('js/mask.js')}}"></script>
</body>
</html>
