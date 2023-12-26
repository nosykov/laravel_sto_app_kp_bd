@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-globe"></i>Виробники
        <a href="/management/brand/create " class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Створити виробника</a>
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
              <th scope="col">Виробник</th>
              <th scope="col">Веб сайт</th>
              <th scope="col">Редагувати</th>
              <th scope="col">Видалити</th>
            </tr>
          </thead>
          <tbody>
            @foreach($brands as $brand)
              <tr>
                <th scope="row">{{$brand->id}}</th>
                <td>{{$brand->name}}</td>
                <td>{{$brand->website}}</td>
                <td>
                  <a href="/management/brand/{{$brand->id}}/edit" class="btn btn-warning">Редагувати</a>
                </td>
                <td>
                <form action="/management/brand/{{$brand->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Видалити" class="btn btn-danger">
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$brands->links()}}
      </div>
    </div>
  </div>
@endsection