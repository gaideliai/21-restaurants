@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redaguoti patiekalą</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{route('menu.update',[$menu->id])}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Pavadinimas</label>
                            <input type="text" name="title" value="{{$menu->title}}" class="form-control">                            
                            <label>Kaina eur</label>
                            <input type="number" step="0.01" name="price" value="{{$menu->price}}" class="form-control">
                            <label>Porcijos svoris g</label>
                            <input type="number" name="weight" value="{{$menu->weight}}" class="form-control">
                            <label>Mėsos kiekis porcijoje g</label>
                            <input type="number" name="meat" value="{{$menu->meat}}" class="form-control">
                            <label>Tekstas meniu</label>
                            <textarea type="text" name="about" class="form-control" id="summernote">{{$menu->about}}</textarea>
                            <img src="{{ asset('images/'.$menu->image) }}" alt="{{$menu->alt}}" style="display: block; width: 250px; height: auto;"><br>
                            <input type="file" name="image"><br>                            
                            <label>Alt:</label>                         
                            <input type="text" name="alt" value="{{$menu->alt}}" class="form-control">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Išsaugoti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>
@endsection