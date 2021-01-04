@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->username}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title"
                           type="text"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           name="title"
                           value="{{ old('title') ?? $user->profile->title }}"
                           autocomplete="title" autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="descrpiton" class="col-md-4 col-form-label">Descrpiton</label>

                    <input id="descrpiton"
                           type="text"
                           class="form-control{{ $errors->has('descrpiton') ? ' is-invalid' : '' }}"
                           name="descrpiton"
                           value="{{ old('descrpiton') ?? $user->profile->descrpiton }}"
                           autocomplete="descrpiton" autofocus>

                    @if ($errors->has('descrpiton'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('descrpiton') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection