@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-hummer"></i>Запчастини
        <a href="/management/part/create " class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Додати запчастину</a>
        <hr>
        @if(Session()->has('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{Session()->get('status')}}
          </div>
        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Назва</th>
              <th scope="col">Категорія</th>
              <th scope="col">Залишок</th>
              <th scope="col">Ціна</th>
              <th scope="col">Редагувати</th>
              <th scope="col">Видалити</th>
            </tr>
          </thead>
          <tbody>
          @foreach($parts as $part)
              <tr>
                <th scope="row">{{$part->id}}</th>
                <td>{{$part->name}}</td>
                <td>{{$part->category}}</td>
                <td>{{$part->rest}}</td>
                <td>{{$part->price}}</td>

                <td>
                  <a href="/management/part/{{$part->id}}/edit" class="btn btn-warning">Редагувати</a>
                </td>
                <td>
                <form action="/management/part/{{$part->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Видалити" class="btn btn-danger">
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$parts->links()}}
      </div>
    </div>
  </div>
@endsection