@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Naujas restoranas</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{route('restaurant.store')}}">
                        <div class="form-group">
                            <label>Pavadinimas</label>
                            <input type="text" name="title" class="form-control">                            
                            <label>Vietų skaičius</label>
                            <input type="number" name="customers" class="form-control">
                            <label>Darbuotojų skaičius</label>
                            <input type="number" name="employees" class="form-control">
                        </div>
                        <select name="menu_id">
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                            @endforeach
                        </select> <br>
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Pridėti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection