@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fas fa-copyright"></i>Додати автомобіль
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
        <form action="/management/car" method="POST">
          @csrf
          <div class="form-group">
            <label for="Client">Власник</label>
            <select class="form-control" name="clientid">
              @foreach ($clients as $client)
                <option value="{{$client->id}}">{{$client->fullname}}</option>
              @endforeach
            </select>
            <label for="CarModel">Модель</label>
            <select class="form-control" name="modelid">
              @foreach ($carmodels as $carmodel)
                <option value="{{$carmodel->id}}">{{$carmodel->name}}</option>

              @endforeach
            </select>          
            <label for="carcolor">Колір</label>
            <input type="text" name="color" class="form-control" placeholder="Колір...">
            <label for="carmileage">Пробіг</label>
            <input type="text" name="mileage" class="form-control" placeholder="пробіг...">
            <label for="carprodyear">Рік виробництва</label>
            <input type="text" name="prodyear" class="form-control" placeholder="Рік...">
            <label for="carregnumber">Номер реєстрації</label>
            <input type="text" name="regnumber" class="form-control" placeholder="Рік...">
          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
@endsection