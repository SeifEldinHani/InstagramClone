@extends('layouts.app')

@section('content')
<div class="container"> 
<form action="/p" enctype="multipart/form-data" method="POST">
<div class="row">

<div class="col-8 offset-2">
<div class="row"><h1> Add New Post</h1></div>

<div class="form-group row">
    @csrf
<label for="Caption" class="col-md-4 col-form-label">Image Caption</label>

            <input id="Caption" type="text" class="form-control @error('Caption') is-invalid @enderror" name="Caption"value="{{ old('Caption') }}" required autocomplete="Caption" autofocus>

            @error('Caption')
                <strong>{{ $message }}</strong>
            @enderror
            </div>


            <div class="row">
            <label for="image" class="col-md-4 col-form-label">Post Image</label>
            <input type = "file" , class="form-control-file" id = "image" name="image"> 
            @error('image')
                    <strong>{{ $message }}</strong>
            @enderror
            </div>
        <div class ="row pt-3">
        <button class = "btn btn-primary"> Add New Post </button>
        </div>

</div>


</div></form>
</div>
@endsection
