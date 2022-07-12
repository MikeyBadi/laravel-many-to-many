<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public static function generateSlug($title){
        $slug=Str::slug($title,'-');
        $base_slug=$slug;
        $c = 1;
        $slug_exist = Post::where('slug', $slug)->first();

        while($slug_exist){
            $slug = $base_slug . '-' . $c;
            $c++;
            $slug_exist = Post::where('slug', $slug)->first();
        }

        return $slug;
    }

    protected $fillable = [
        'title',
        'slug',
        'content'

    ];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
