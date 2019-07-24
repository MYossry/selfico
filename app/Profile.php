<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded =[];

    public function profileimage()
    {
        $imagepath=($this->image) ? $this->image : "Posts/Zb18xspd3IlPjNtndyjK6x3uDz48VAiFC55LmhBZ.png";
        return "/storage/{$imagepath}";
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

}
