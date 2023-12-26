@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-globe"></i>Створити клієнта
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
        <form action="/management/client" method="POST">
          @csrf
          <div class="form-group">
            <label for="brandName">Повне ім'я</label>
            <input type="text" name="fullname" class="form-control" placeholder="Ім'я...">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="email...">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" class="form-control" placeholder="телефон...">
            <label for="address">Адреса</label>
            <input type="text" name="address" class="form-control" placeholder="адреса...">
          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
@endsection