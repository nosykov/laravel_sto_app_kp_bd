@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-circle-user"></i>Працівники
        <a href="/management/master/create " class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Додати працівника</a>
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
              <th scope="col">Редагувати</th>
              <th scope="col">Видалити</th>
            </tr>
          </thead>
          <tbody>
          @foreach($masters as $master)
              <tr>
                <th scope="row">{{$master->id}}</th>
                <td>{{$master->fullname}}</td>
                <td>{{$master->email}}</td>
                <td>{{$master->phone}}</td>                
                <td>
                  <a href="/management/master/{{$master->id}}/edit" class="btn btn-warning">Редагувати</a>
                </td>
                <td>
                <form action="/management/master/{{$master->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Видалити" class="btn btn-danger">
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$masters->links()}}
      </div>
    </div>
  </div>
@endsection