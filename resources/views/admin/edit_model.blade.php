@extends('layout')

@section('content')
<section>
    <div class="container">
        <h1>Управление марками</h1>

        <h2>Добавить марку</h2>
        <div class="form-panel">
            <form enctype="multipart/form-data" action="{{route('edit_model')}}" method="post">
                @csrf
                @foreach($models as $model)
                    <div class="form-group">
                        <input type="text" name="id" value="{{$model->id}}" hidden>
                        <label for="productBrand">Марка</label>
                        <select class="form-control" name="brand_id" id="productBrand">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand}}</option>
                            @endforeach
                        </select>
                        <label for="Model">Модель</label>
                        <input type="text" class="form-control" id="Model" name="model" value="{{$model->model}}">
                    </div>

                    <input type="submit" class="form-btn_send" value="Редактировать">
                @endforeach
            </form>
        </div>
    </div>
</section>
@endsection
