@extends('layouts.app')

@section('content')
<div class="container align-items-center">
    <div class="col-6 offset-5 pb-4">
        <a href="/profile/{{auth()->user()->id}}">
            <button class="btn btn-outline-secondary">My Profile</button>
        </a>
    </div>
    @foreach($posts as $post)
    <div class="col-6 offset-2 pb-3">
            <img src="/storage/{{$post->image}}" style="max-width: 600px">

        <div class="row d-flex pt-2 pl-3 ">
            <a href="#" class="pr-4 text-dark"><span class="h6 font-weight-bold">{{$post->user->username}}</span></a>
            <span>{{$post->caption}}</span>
         </div>
    </div>
        @endforeach
</div>
@endsection
