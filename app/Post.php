<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//start lecture 10.57
use Illuminate\Database\Eloquent\SoftDeletes;
//end lecture 10.57

class Post extends Model
{
    //Post -> table is posts
     use SoftDeletes;
    /**
     * @var mixed|string
     */
    private $title;
    //protected $dates = ['deleted_at'];
    protected $fillable=['title', 'content','path'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photos(){
        return $this->morphMany('App\Photo','imageable');
    }
    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }
    public static function scopeHello($query){
        return $query->orderBy('id','desc')->get();
    }
}
