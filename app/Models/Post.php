<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $directory= "/images/";
    use HasFactory;
    #Just in case u need them
    // protected  $table  = 'posts';
    // protected $primaryKey = 'post_id';
    protected $fillable = [
        'title',
        'content',
        'path',
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
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->directory, //accessor

        );
    }
}
