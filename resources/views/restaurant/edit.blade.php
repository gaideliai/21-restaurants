@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redaguoti restorano informaciją</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{route('restaurant.update', [$restaurant])}}">
                        <div class="form-group">
                            <label>Pavadinimas</label>
                            <input type="text" name="title" value="{{old('title', $restaurant->title)}}" class="form-control">                            
                            <label>Vietų skaičius</label>
                            <input type="number" name="customers" value="{{old('customers', $restaurant->customers)}}" class="form-control">
                            <label>Darbuotojų skaičius</label>
                            <input type="number" name="employees" value="{{old('employees', $restaurant->employees)}}" class="form-control">
                        </div>
                        <select name="menu_id">
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}" @if($menu->id == $restaurant->menu_id) selected @endif>{{$menu->title}}</option>
                            @endforeach
                        </select> <br>
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Išsaugoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection