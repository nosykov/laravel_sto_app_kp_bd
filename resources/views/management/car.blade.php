@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fa-solid fa-car"></i>Автомобілі
        <a href="/management/car/create " class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>Додати автомобіль</a>
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
              <th scope="col">Клієнт</th>
              <th scope="col">Модель</th>
              <th scope="col">Колір</th>
              <th scope="col">Пробіг</th>
              <th scope="col">Рік виробництва</th>
              <th scope="col">Номер</th>
              <th scope="col">Редагувати</th>
              <th scope="col">Видалити</th>              
            </tr>
          </thead>
          <tbody>
            @foreach($cars as $car)
              <tr>
                <th scope="row">{{$car->id}}</th>
                <td>{{$car->client->fullname}}</td>
                <td>{{$car->carmodel->brand->name}} {{$car->carmodel->name}} {{$car->carmodel->revision}}</td>
                <td>{{$car->color}}</td>
                <td>{{$car->mileage}}</td>
                <td>{{$car->prodyear}}</td>
                <td>{{$car->regnumber}}</td>
                <td>
                  <a href="/management/car/{{$car->id}}/edit" class="btn btn-warning">Редагувати</a>
                </td>
                <td>
                <form action="/management/car/{{$car->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Видалити" class="btn btn-danger">
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$cars->links()}}
      </div>
    </div>
  </div>
@endsection