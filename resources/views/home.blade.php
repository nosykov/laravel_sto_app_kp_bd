@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управління</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center" >
                        <div class="col-sm-4">
                            <a href="/management">
                                <h4>Адміністрування</h4>
                                <img width="50px" src="{{'images/managment.png'}}"/>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="/accounting">
                                <h4>Розрахунки</h4>
                                <img width="50px" src="{{'images/accounting.png'}}"/>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
