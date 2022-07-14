@extends('layout')

@section('content')

    <section class="authorization">
        <div class="container">
            <h1>Авторизация</h1>
            <form action="{{route('login')}}" method="post" class="auth-form">
                @csrf
                <div class="form-group">
                    <label for="AdminLogin">Логин</label>
                    <input type="text" class="form-control" name="login" id="AdminLogin">
                </div>

                <div class="form-group">
                    <label for="AdminPassword">Пароль</label>
                    <input type="password" class="form-control" name="password" id="AdminPassword">
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

                <input type="submit" class="form-btn_send" value="Войти">
            </form>
        </div>
    </section>

@endsection
