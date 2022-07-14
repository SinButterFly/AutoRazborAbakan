@extends('layout')

@section('content')
<section>
    <div class="container">
        <h1>Управление категориями</h1>

        <h2>Редактировать Категорию</h2>
        <div class="form-panel">
            <form enctype="multipart/form-data" action="{{route('edit_category')}}" method="post">
                @csrf
                @foreach($categories as $category)
                    <div class="form-group">
                        <input type="text" name="id" value="{{$category->id}}" hidden>
                        <label for="Category">Категория</label>
                        <input type="text" class="form-control" id="Category" name="category" value="{{$category->category}}">
                    </div>

                    <input type="submit" class="form-btn_send" value="Редактировать">
                @endforeach
            </form>
        </div>
    </div>
</section>
@endsection
