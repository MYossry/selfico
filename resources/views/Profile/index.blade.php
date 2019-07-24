@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5 pb-2 d-flex " >
        <div class="col-3">
            <img src="{{$user->profile->profileimage()}}" alt="profile picture" class="rounded-circle w-75">
        </div>
        <div class="col-7">
            <div class="d-flex">
                <div class="h3 pr-3">{{$user->username}}</div>
                @can('follow',$user->profile)
                <div>
                    <followbutton user-Id="{{$user->id}}" stat="{{$stat}}"></followbutton>
                </div>
                    @endcan
            </div>
            <div class="d-flex py-2">
                <div class="pr-3">{{$postsCount}} <strong>Posts</strong></div>
                <div class="pr-3">{{$followersCount}} <strong>Followers</strong></div>
                <div class="pr-3">{{$followingCount}} <strong>Following</strong></div>
            </div>
            <div>
                <h5>{{$user->profile->title}}</h5>
                <p>{{$user->profile->bio}}</p>
                <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>
            </div>
        </div>
        @can('update',$user->profile)
        <div class="col-2" style="padding-top: 130px">
            <a href="/p/create">
                <button class="btn btn-outline-secondary" >Add New Post</button>
            </a>
        </div>
            @endcan
    </div>
    <hr>
    <div class="row">

    @foreach($user->posts as $post)
        <div class="col-4">
            <a href="/p/{{$post->id}}"><img src="\storage\{{$post->image}}" alt="" class="w-100 pt-4"></a>
        </div>
        @endforeach
    </div>
</div>
@endsection
