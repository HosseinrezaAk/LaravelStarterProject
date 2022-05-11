<?php

use App\Models\Role;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/*
|-----------------------------------------------------------------------
| Many TO Many Crud
|-----------------------------------------------------------------------
*/

Route::get('/create/',function (){
    $user = User::find(1);
    $role = new Role(['name'=>'Administrator']);
    $user->roles()->save($role);
});

Route::get('/create/role/{roleName}',function ($roleName){
    $newRole = new Role(['name'=>$roleName]);
    $newRole->save();
});

Route::get('/read',function (){
    $user = User::findorfail(1);
    foreach ($user->roles as $role){
        echo $role->name;
    }
});

Route::get('/update/{user_id}/{roleName}', function ($user_id,$roleName){
    $user = User::find($user_id);
    $roles = $user->roles();
    foreach($roles as $role){
        $role->name = $roleName;
        $role->save();
    }

});

Route::get('/delete/{user_id}/{role_id}',function ($user_id,$role_id){
    $user = User::find($user_id);
    foreach($user->roles as $role){
        $role->where('id',$role_id)->delete();
    }
});


Route::get('/attach',function (){
    $user = User::findorfail(1);
    $user->roles()->attach(1);
});



Route::get('/detach',function (){
    $user = User::findorfail(1);
    $user->roles()->detach(1);
});

Route::get('/sync',function (){
    $user = User::findorfail(1);
    $user->roles()->sync([1]);
});
