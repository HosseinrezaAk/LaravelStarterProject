<?php

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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
| PolyMorphic Relation
|-----------------------------------------------------------------------
*/

Route::get('/create',function (){
    $staff = Staff::find(1);
    $staff->photos()->create(['path'=>'example.jpg']);
});

Route::get('/read',function (){
   $staff = Staff::find(1);
   foreach ($staff->photos as $photo){
       return $photo->path;
    }
});

Route::get('/update',function (){
    $staff = Staff::find(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->path = "updated example.jpg";
    $photo->save();
});


Route::get('/delete',function (){
    $staff = Staff::findorfail(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->delete();
});

Route::get('/assign',function (){
   $staff = Staff::find(1);
   $photo = Photo::find(2);
   $staff->photos()->save($photo);
});

Route::get('/un-assign',function (){
    $staff = Staff::find(1);
    $staff->photos()->whereId(2)->update(['imageable_id'=>'12','imageable_type'=>'']);
});

