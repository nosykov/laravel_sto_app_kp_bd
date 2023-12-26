@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-globe"></i>Створити виробника
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
        <form action="/management/brand" method="POST">
          @csrf
          <div class="form-group">
            <label for="brandName">Назва виробника</label>
            <input type="text" name="name" class="form-control" placeholder="Виробник...">
            <label for="brandwebsite">Веб сайт</label>
            <input type="text" name="website" class="form-control" placeholder="Веб сайт...">
          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
@endsection