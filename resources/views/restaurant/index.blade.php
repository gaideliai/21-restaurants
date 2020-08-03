@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-uppercase">Restoranai</h1>
        </div>
    </div>
    <div class="row justify-content-center">                
    <form action="{{route('restaurant.index')}}" method="get" class="col-md-8 mb-3">
        <div class="p-4" style="background:#fff;border:1px solid #ddd; border-radius:5px;">
            <select name="menu_id">
                <option value="0">Rodyti visus</option>
                @foreach ($menus as $menu)
                    <option value="{{$menu->id}}" @if($selectId == $menu->id) selected @endif>{{$menu->title}}</option>
                @endforeach
            </select>       
            <button type="submit" class="btn btn-outline-secondary btn-sm mx-3">Rodyti</button>
            <a href="{{route('restaurant.index')}}" class="btn btn-outline-secondary btn-sm">Visi restoranai</a>
        </div>
    </form>
    @if (count($restaurants))
        
    
    @foreach ($restaurants as $restaurant)
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
                        <div>{!!$restaurant->getMenus->about!!}</div>
                        <div>Porcijos svoris: {{$restaurant->getMenus->weight}}g</div> 
                        <div>Mėsos kiekis porcijoje: {{$restaurant->getMenus->meat}}g</div>
                        <div>Kaina: {{$restaurant->getMenus->price}}&#8364;</div>
                    </div>                                           
                    <a href="{{route('restaurant.edit',[$restaurant])}}" class="btn btn-dark mt-3">Redaguoti</a><br>

                    <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3">Išrinti</button>
                    </form>
                    <br>                    
                </div>
            </div>
        </div>        
    @endforeach
    @else
        <div class="col-md-8">
            <div class="card">
                <div class="p-4">Nerasta rezultatų</div>
            </div>
        </div>
        
    @endif

    </div>
</div>
@endsection