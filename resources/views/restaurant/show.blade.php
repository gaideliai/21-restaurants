@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-uppercase">{{$restaurant->title}}</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">{{$restaurant->title}}</div>
                <div class="card-body">
                    <div>Vietų skaičius: {{$restaurant->customers}}</div>
                    <div>Darbuotojų skaičius: {{$restaurant->employees}}</div>
                    <div>
                        <span class="font-weight-bold">Dienos patiekalas:</span>
                        {{$restaurant->getMenus->title}}
                    </div>
                    <div class="ml-4">
                        <img src="{{asset('images/'.$restaurant->getMenus->image)}}" alt="{{$restaurant->getMenus->alt}}" style="display: block; width: 250px; height: auto;">                      
                        <div>{!!$restaurant->getMenus->about!!}</div>
                        <div>Porcijos svoris: {{$restaurant->getMenus->weight}}g</div> 
                        <div>Mėsos kiekis porcijoje: {{$restaurant->getMenus->meat}}g</div>
                        <div>Kaina: {{$restaurant->getMenus->price}}&#8364;</div>
                    </div>                                           
                    <a href="{{route('restaurant.edit',[$restaurant])}}" class="btn btn-dark mt-3">Redaguoti</a><br>
                    <a href="{{route('restaurant.index')}}" class="btn btn-primary mt-3">Atgal</a>                    
                    <br>                    
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection