@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-8">
            <img src="/storage/{{$post->image}} "class="w-100">
        </div>
        <div class="col-3">
            <div class="row d-flex align-items-center mt-3">
                <img src="{{$post->user->profile->profileimage()}}" class="rounded-circle mr-2" style="max-width: 30px">
                <a href="/profile/{{$post->user_id}}" class="pr-4 text-dark"><h3>{{$post->user->username}}</h3></a>
                <a href="#" class="text-dark"><strong>Follow</strong></a>
            </div>

            <div class="row d-flex align-items-center mt-3">
                <a href="/profile/{{$post->user_id}}" class="pr-4 text-dark"><span class="h5">{{$post->user->username}}</span></a>
                <span>{{$post->caption}}</span>
            </div>
        </div>
    </div>
</div>
@endsection
