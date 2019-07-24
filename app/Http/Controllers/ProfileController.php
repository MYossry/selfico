<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $stat =(auth()->user())? auth()->user()->following->contains($user->id) :false;
        $postsCount=Cache::remember('post.count.'.$user->id, now()->addSecond(60), function () use ($user){
            return $user->posts->count();
    } );
        $followersCount=Cache::remember('followers.count.'.$user->id, now()->addSecond(60), function () use ($user){
            return $user->profile->followers->count();
        } );
        $followingCount=Cache::remember('following.count.'.$user->id, now()->addSecond(60), function () use ($user){
            return $user->following->count();
        } );

        return view('Profile.index',compact('user','stat','followersCount','postsCount','followingCount'));
    }
    public function edit(User $user)
    {
       return view('Profile.edit',compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data=request()->validate([
           'title' => 'required',
           'bio' => 'required',
           'url' => '',
           'image' => '',
        ]);
        if(request('url'))
        {
            $urlarray=['url'=>$data['url']];
        }
        if (request('image')){
            $imagepath=request('image')->store('profile','public');
            $image=Image::make(public_path("/storage/{$imagepath}"))->fit(1000,1000);
            $image->save();
            $imageArr=['image'=>$imagepath];
        }
        $user->profile()->update(array_merge(
            $data,
            $imageArr ??[],
            $urlarray ?? []
        ));
        return redirect("/profile/".$user->id);

    }
    //
}
