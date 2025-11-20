<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    protected $guarded=[];
    use HasFactory;
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::saving(function($post){
    //         $post->slug=Str::slug($post->title);
    //     });
    //     static::deleted(function($post){
    //         $post->comments()->delete();
    //     });
    // }
    // public function title() : Attribute {
    //       return Attribute::make(
    //         set: fn($value) =>[
    //             'slug'=>Str::slug($value),
    //             'title'=>$value
    //         ]
    //     );
    // }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
