@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-globe"></i>Редагувати виробника
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
        <form action="/management/brand/{{$brand->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="brandName">Назва виробника</label>
            <input type="text" name="name" value={{$brand->name}} class="form-control" placeholder="Виробник...">
            <label for="brandwesite">Весайт виробника</label>
            <input type="text" name="website" value={{$brand->website}} class="form-control" placeholder="Вебсайт...">

          </div>
          <button type="submit" class="btn btn-primary">Оновити</button>
        </form>
      </div>
    </div>
  </div>
@endsection