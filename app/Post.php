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
    protected $fillable=[
        'title',
        'content',
    ];
}
