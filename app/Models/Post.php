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
}
