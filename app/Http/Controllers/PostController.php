<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function create()
    {
       return view('Posts.create');
    }
    public function store()
    {
        $data=request()->validate([
            'caption'=>'required',
            'image'=>['required','image']
        ]);
        $imagepath = request('image')->store('Posts','public');
        $image=Image::make(public_path("storage/{$imagepath}"))->fit(1200,1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagepath
        ]);
        return redirect("profile/".auth()->user()->id);
    }
    public function show(Post $post)
    {
       return view('Posts.show',compact('post'));
    }

}
