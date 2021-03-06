@extends('layout')

@section('content')
<section class="about-us">
    <div class="container">
        <h1>О нас</h1>
        <p class="about-us_text">
            Центр авторазобра российских автомобилей - это компания по разбору автомобилей на составные части.
            Осуществляем продажу б/у автозапчастей, которые готовы к эксплуатации.
            Также принимаем автомобили для разбора, можете обращаться удобным вам способом.
            Имеем удобное помещения для разбора автомобилей, складское помещение для хранения автодеталей.
            Предоставляем широкий выбор автозапчастей на весь российский автопром.
        </p>
        <div class="about-us_img">
            <img src="{{asset('img/place.jpg')}}" alt="помещение">
        </div>

    </div>
</section>
@endsection
