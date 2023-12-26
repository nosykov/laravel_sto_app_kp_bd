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
        <form action="/management/part" method="POST">
          @csrf
          <div class="form-group">
            <label for="brandName">Назва</label>
            <input type="text" name="name" class="form-control" placeholder="Назва...">
            <label for="pcategory">Категорія</label>
            <input type="text" name="category" class="form-control" placeholder="Категорія...">
            <label for="prest">Залишок</label>
            <input type="text" name="rest" class="form-control" placeholder="Залишок...">
            <label for="pprice">Ціна</label>
            <input type="text" name="price" class="form-control" placeholder="Ціна...">
          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
@endsection