@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-globe"></i>Редагувати працівника
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
        <form action="/management/master/{{$master->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="brandName">Повне ім'я</label>
            <input type="text" name="fullname" value="{{$master->fullname}}" class="form-control" placeholder="Ім'я...">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{$master->email}}" class="form-control" placeholder="email...">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" value="{{$master->phone}}" class="form-control" placeholder="телефон...">
          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
@endsection