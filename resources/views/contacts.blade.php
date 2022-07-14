@extends('layout')

@section('content')
<section>
    <div class="container">
        <h1>Контакты</h1>

        <div class="row">
            <div class="col-4">
                <h4>Адрес</h4>
                <p>г.Абакан, ул.Катанова, дом 12</p>

                <h4>Электронная почта</h4>
                <p>avtorazborabakan@gmail.com</p>

                <h4>Номера телефонов</h4>
                <p>+7 (983) 376-67-00</p>

                <h4>Время работы</h4>
                <p>Пн - Пт с 08:00 до 20:00</p>

{{--                <h4>Реквизиты</h4>
                <p>ИП Иванов Д.А.</p>
                <p>Факт. адрес:655001, Россия, г. Абакан, ул.Катанова, дом 12</p>
                <p>ИНН 6785018729 </p>
                <p>КПП 668632781</p>
                <p>ОГРН 1246789152164</p>
                <p>Расч.счет: 40705870745051000866</p>
                <p>БИК 045574664</p>--}}
            </div>

            <div class="com-8">
                <h4>Мы на карте</h4>
                <div style="position:relative;overflow:hidden;">
                    <a href="https://yandex.ru/maps/1095/abakan/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Абакан</a>
                    <a href="https://yandex.ru/maps/1095/abakan/house/ulitsa_katanova_12/bUgYcgBiT0UAQFtpfXtzeXlkbA==/?ll=91.472859%2C53.728491&utm_medium=mapframe&utm_source=maps&z=18" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Катанова, 12 на карте Абакана — Яндекс.Карты</a>
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCUarWcHTC" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
