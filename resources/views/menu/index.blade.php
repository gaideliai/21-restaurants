@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-uppercase">Patiekalai</h1>
        </div>
    </div>
    @foreach ($menus as $menu)
   <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">{{$menu->title}}</div>
                <div class="card-body">
                    <div>{!!$menu->about!!}</div>
                    <div>Porcijos svoris: {{$menu->weight}}g</div> 
                    <div>Mėsos kiekis porcijoje: {{$menu->meat}}g</div>
                    <div>Kaina: {{$menu->price}}&#8364;</div>
                    <img src="{{asset('images/'.$menu->image)}}" alt="{{$menu->alt}}" style="display: block; width: 250px; height: auto;">                   
                    <a href="{{route('menu.edit',[$menu])}}" class="btn btn-dark mt-3">Redaguoti</a><br>

                    <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3">Išrinti</button>
                    </form>
                    <br>                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection