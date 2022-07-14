@extends('layout')

@section('content')
    <div class="container">
        <h1>Управление моделями</h1>

        <h2>Добавить модель</h2>
        <form class="form-panel" action="/panel/model" method="post">
            @csrf
            <div class="form-group">
                <label for="productBrand">Марка</label>
                <select class="form-control" name="brand_id" id="productBrand">
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->brand}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Model">Модель</label>
                <input type="text" class="form-control" id="Model" name="model">
            </div>

            <input type="submit" class="form-btn_send" value="Добавить">
        </form>

        <h2>Таблица моделей</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Марка</th>
                <th>Модель</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($models as $model)

                <tr>
                    <td>{{$model->model_brand['brand']}}</td>
                    <td>{{$model->model}}</td>
                    <td><a href="{{route('edit_model')}}?id={{$model->id}}">Редактировать</a></td>
                    <td><a href="{{route('delete_model')}}?id={{$model->id}}">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $models->links() }}
    </div>
@endsection

