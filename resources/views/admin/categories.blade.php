@extends('layout')

@section('content')

    <div class="container">
        <h1>Управление категориями</h1>

        <h2>Добавить категорию</h2>
        <form class="form-panel" action="{{route('create_category')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="Category">Категория</label>
                <input type="text" class="form-control" id="Category" name="category">
            </div>

            <input type="submit" class="form-btn_send" value="Добавить">
        </form>

        <h2>Таблица категорий</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Категория</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->category}}</td>
                    <td><a href="{{route('edit_category')}}?id={{$category->id}}">Редактировать</a></td>
                    <td><a href="{{route('delete_category')}}?id={{$category->id}}">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>

@endsection
