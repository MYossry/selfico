@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data"  method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>
                        <input id="title" type="text" class="form-control
                       @error('title') is-invalid @enderror"
                               name="title" value="{{ $user->profile->title }}"
                               required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                </div>
                <div class="form-group row">
                    <label for="bio" class="col-md-4 col-form-label">Bio</label>

                        <input id="bio" type="text" class="form-control
                       @error('bio') is-invalid @enderror"
                               name="bio" value="{{$user->profile->bio}}"
                               required autocomplete="bio" autofocus>

                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">Url</label>

                        <input id="url" type="text" class="form-control
                       @error('url') is-invalid @enderror"
                               name="url" value="{{ $user->profile->url }}"
                                autocomplete="url" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Profile Image</label>
                    <input id="image" type="file" class="form-control-file" name="image">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="row"><button class="btn-outline-secondary btn">Update</button></div>
            </div>
        </div>
    </form>
</div>
@endsection
