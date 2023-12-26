@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    @include('management.inc.sidebar')
      <div class="col-md-8">
      <i class="fas fa-copyright"></i>Створити модель
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
        <form action="/management/carmodel" method="POST">
          @csrf
          <div class="form-group">
            <label for="modelName">Назва моделі</label>
            <input type="text" name="name" class="form-control" placeholder="Модель...">
            <div class="form-group">
            <label for="Brand">Виробник</label>
            <select class="form-control" name="brandid">
              @foreach ($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>

              @endforeach
            </select>
          </div>
            <label for="modelstartyear">Рік початку виробництва</label>
            <input type="text" name="startyear" class="form-control" placeholder="Рік...">
            <label for="modelendyear">Рік закінчення виробництва</label>
            <input type="text" name="endyear" class="form-control" placeholder="Рік...">
            <label for="modelrevision">Ревізія</label>
            <input type="text" name="revision" class="form-control" placeholder="Ревізія...">


          </div>
          <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
      </div>
    </div>
  </div>
@endsection