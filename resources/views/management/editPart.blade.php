@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-circle-user"></i>Додати запчастину
        <hr>
        @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
              </ul>
          </div>
        @endif
        <form action="/management/part/{{$part->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="brandName">Назва</label>
            <input type="text" name="name" value="{{$part->name}}" class="form-control" placeholder="Назва...">
            <label for="pcategory">Категорія</label>
            <input type="text" name="category" value="{{$part->category}}" class="form-control" placeholder="Категорія...">
            <label for="prest">Залишок</label>
            <input type="text" name="rest" value="{{$part->rest}}" class="form-control" placeholder="Залишок...">
            <label for="pprice">Ціна</label>
            <input type="text" name="price" value="{{$part->price}}" class="form-control" placeholder="Ціна...">
          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
@endsection