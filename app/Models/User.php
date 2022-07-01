<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function post(){

        return $this->hasOne('App\Models\Post');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');
        // return $this->belongsToMany('App\Models\Role', 'user_roles','user_id','role_id'); #incase u wanna customize
    }

    public function photos(){

        return $this->morphMany('App\Models\Photo','imageable');

    }

    /**
     * Accessor for getting attribute
     * @return Attribute
     *
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value), //accessor
            set: fn($value) => strtoupper($value) //mutator
        );
    }

    public function isAdmin()
    {
        if ($this->role->name == 'Adminstrator') // imagine u have a role method
        {
            return true;
        }
        else{
            return false;
        }
    }





    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
