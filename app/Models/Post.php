<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    #Just in case u need them
    // protected  $table  = 'posts';
    // protected $primaryKey = 'post_id';
    protected $fillable = [
        'title',
        'content'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function photos(){

        return $this->morphMany('App\Models\Photo','imageable');

    }

    public function tags(){
        return $this->morphToMany('App\Models\Tag','taggable');
    }

    public function scopeLatestPosts($query){
        return $query->orderBy('id','asc')->get();
    }
}
