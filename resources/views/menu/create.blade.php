@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Naujas patiekalas</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Pavadinimas</label>
                            <input type="text" name="title" class="form-control">                            
                            <label>Kaina eur</label>
                            <input type="number" step="0.01" name="price" class="form-control">
                            <label>Porcijos svoris g</label>
                            <input type="number" name="weight" class="form-control">
                            <label>Mėsos kiekis porcijoje g</label>
                            <input type="number" name="meat" class="form-control">
                            <label>Tekstas meniu</label>
                            <textarea type="text" name="about" class="form-control" id="summernote"></textarea>
                            <label>Nuotrauka</label>
                            <input type="file" name="image"><br>
                            <label>Alt</label>
                            <input type="text" name="alt" class="form-control">
                        </div>                        
                        @csrf
                        <button type="submit" class="btn btn-primary">Pridėti</button>
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