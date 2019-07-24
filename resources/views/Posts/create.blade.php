@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/store" enctype="multipart/form-data"  method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Caption</label>
                        <input id="caption" type="text" class="form-control
                       @error('caption') is-invalid @enderror"
                               name="caption" value="{{ old('caption')}}"
                               required autocomplete="caption" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Post Image</label>
                    <input id="image" type="file" class="form-control-file" name="image" required>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="row"><button class="btn-outline-secondary btn">Post</button></div>
            </div>
        </div>
    </form>
</div>
@endsection
