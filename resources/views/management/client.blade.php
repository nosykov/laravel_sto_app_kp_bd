@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-person"></i>Клієнти
        <a href="/management/client/create " class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Створити клієнта</a>
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
              <th scope="col">ПІБ</th>
              <th scope="col">email</th>
              <th scope="col">Телефон</th>
              <th scope="col">Адреса</th>
              <th scope="col">Редагувати</th>
              <th scope="col">Видалити</th>
            </tr>
          </thead>
          <tbody>
          @foreach($clients as $client)
              <tr>
                <th scope="row">{{$client->id}}</th>
                <td>{{$client->fullname}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->address}}</td>
                <td>
                  <a href="/management/client/{{$client->id}}/edit" class="btn btn-warning">Редагувати</a>
                </td>
                <td>
                <form action="/management/client/{{$client->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Видалити" class="btn btn-danger">
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$clients->links()}}
      </div>
    </div>
  </div>
@endsection