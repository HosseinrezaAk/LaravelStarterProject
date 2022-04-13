<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
| DATABASE RAW SQL QUERIES
|-----------------------------------------------------------------------
*/


### Insert 1 row data to our DB
// Route::get('/insert', function(){
//     DB::insert('insert into posts(title, content) values(?,?)',['Laravel is Awesome','Laravel is the best thing that has happened to PHP. Period']);
// });

### Read data
// Route::get('/read',function(){
//     $results = DB::select('select * from posts where id =?',[1]);
//     foreach ($results as $post) {
//          return $post->title;
//     }
// });

### Update data
// Route::get('/update',function(){
//     $updated = DB::update('update posts set title= "Update title " where id = ?',[1]);
//     return $updated;
// });

### Delete Data
// Route::get('/delete',function(){
//     $deleted = DB::delete('delete from posts where id=?',[1]);
//     return $deleted;
// });




/*
|-----------------------------------------------------------------------
|  ELOQUENT ORM
|-----------------------------------------------------------------------
*/


### Read data or find specific data
// Route::get('/read',function(){
//     $posts = Post::all();
//     // $post = Post::find(2);
//     foreach($posts as $post){
//         return $post->title;
//     }
// });


### Get specific data with specific options
// Route::get('/findwhere',function(){
//     $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//     return $posts;
// });

Route::get('/findmore',function(){
    $posts = Post::FindOrFail(2);
    return $posts;
});
