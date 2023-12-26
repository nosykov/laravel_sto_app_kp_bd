@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-globe"></i>Виробники
        <a href="/management/carmodel/create " class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Створити модель</a>
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
              <th scope="col">Модель</th>
              <th scope="col">Виробник</th>
              <th scope="col">Рік початку</th>
              <th scope="col">Рік закінченя</th>
              <th scope="col">Ревізія</th>
              <th scope="col">Редагувати</th>
              <th scope="col">Видалити</th>              
            </tr>
          </thead>
          <tbody>
            @foreach($carmodels as $carmodel)
              <tr>
                <th scope="row">{{$carmodel->id}}</th>
                <td>{{$carmodel->name}}</td>
                <td>{{$carmodel->brand->name}}</td>
                <td>{{$carmodel->startyear}}</td>
                <td>{{$carmodel->endyear}}</td>
                <td>{{$carmodel->revision}}</td>
                <td>
                  <a href="/management/carmodel/{{$carmodel->id}}/edit" class="btn btn-warning">Редагувати</a>
                </td>
                <td>
                <form action="/management/carmodel/{{$carmodel->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Видалити" class="btn btn-danger">
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$carmodels->links()}}
      </div>
    </div>
  </div>
@endsection