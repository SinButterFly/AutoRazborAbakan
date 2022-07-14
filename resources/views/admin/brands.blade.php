@extends('layout')

@section('content')
    <div class="container">
        <h1>Управление марками</h1>

        <h2>Добавить марку</h2>
        <div class="form-panel">
            <form enctype="multipart/form-data" action="/panel/brand" method="post">
                @csrf
                <div class="form-group">
                    <label for="Brand">Марка</label>
                    <input type="text" class="form-control" id="Brand" name="brand">
                </div>

                <div class="form-group">
                    <label for="photoBrand">Фотография</label>
                    <input type="file" class="form-control-file" id="photoBrand" name="photo">
                </div>

                <input type="submit" class="form-btn_send" value="Добавить">

            </form>
        </div>

        <h2>Таблица марок</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Марка</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{$brand->brand}}</td>
                    <td><a href="{{route('edit_brand')}}?id={{$brand->id}}">Редактировать</a></td>
                    <td><a href="{{route('delete_brand')}}?id={{$brand->id}}">Удалить</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginate">
            {{ $brands->links() }}
        </div>
    </div>
@endsection
