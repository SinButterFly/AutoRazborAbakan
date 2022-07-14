@extends('layout')

@section('content')
<section>
    <div class="container">
        <h1>Управление марками</h1>

        <h2>Редактировать марку</h2>
        <div class="form-panel">
            <form enctype="multipart/form-data" action="{{route('edit_brand')}}" method="post">
                @csrf
                @foreach($brands as $brand)
                    <div class="form-group">
                        <input type="text" name="id" value="{{$brand->id}}" hidden>
                        <label for="Brand">Марка</label>
                        <input type="text" class="form-control" id="Brand" name="brand" value="{{$brand->brand}}">
                    </div>

                    <input type="submit" class="form-btn_send" value="Редактировать">
                @endforeach
            </form>
        </div>
    </div>
</section>
@endsection
