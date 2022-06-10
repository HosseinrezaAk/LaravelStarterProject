<?php

use App\Http\Controllers\PostsController;
use App\Models\Tag;
use Carbon\Carbon;
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


### Another find method
// Route::get('/findmore',function(){
//     $posts = Post::FindOrFail(2);
//     return $posts;
// });


###Insert method
// Route::get('/basicinsert',function(){
//     $post = new Post;
//     $post->title = 'New Eloquent title insert';
//     $post->content = 'Eloquent is really cool, wow!';
//     $post->save();
// });


### Update method
// Route::get('/basicupdate',function(){
//     $post = Post::find(2);
//     $post->title = 'Updated title via basicUpdate';
//     $post->content = 'Eloquent is really cool, wow!';
//     $post->save();
// });


### CREATE method
// Route::get('/create',function(){
//     Post::create(['title'=>'The create method','content'=>'WOW I\'m learning alot']);

// });

### Update without save method
// Route::get('/update',function(){
//     Post::where('id',2)->update(['title'=>'newUpdate','content'=>'new COntent']);
// });

### Delete Method 1
// Route::get('/delete1',function(){
//     $post = Post::find(2);
//     $post->delete();
// });

### Delete Method2 , Delete mutliple values
// Route::get('/delete2',function(){
//     Post::destroy([4,5]);
// });


/*
|-----------------------------------------------------------------------
|  ELOQUENT RELATIONS
|-----------------------------------------------------------------------
*/

### One To One Relationship
// Route::get('/user/{id}/post',function($id){
//     return User::find($id)->post;
// });

// Route::get('/post/{id}/user',function($id){
//     return Post::find($id)->user->name ;
// });


### One to Many Relation
// Route::get('/posts',function(){
//    $user = User::find(1);
//    foreach($user->posts as $post){
//        echo $post->title . "<br>";
//    }
// });


### Many to Many
// Route::get('/user/{id}/role',function($id){

//     $user = User::find($id)->roles()->orderBy('id','desc')->get();
//     return $user;
//     // $users = User::find($id);
//     // foreach($users->roles as $role ){
//     //     echo $role->name ."<br>";
//     // }
// });

### accessing intermedate table
// Route::get('/user/pivot',function(){
//     $user = User::find(1);
//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//     }
// });

### Has many Through relationship
// Route::get('/user/country',function(){
//     $country = Country::find(1);
//     foreach($country->posts as $post){
//         echo $post->title."<br>";
//         echo $country;
//     }
// });



### PolyMorphic

// Route::get('user/photos',function(){
//     $user = User::find(1);
//     foreach($user->photos as $photo){
//         return $photo;
//     }
// });

### inverse Poly
//Route::get('photo/{id}/post', function($id){
//    $photo = Photo::findorFail($id);
//    return $photo;
//});

### Many TO many Poly
//Route::get('/post/tag',function (){
//    $post = Post::find(1);
//    foreach($post->tags as $tag){
//        echo $tag->name;
//    }
//});
//
//Route::get('/tag/post',function (){
//    $tag = Tag::find(2);
//
//    foreach($tag->posts as $post){
//        echo $post->title;
//    }
//});




/*
|-----------------------------------------------------------------------
|  CRUD form Application
|-----------------------------------------------------------------------
*/



Route::group(['middleware'=>'web'],function(){
    Route::resource('/posts',PostsController::class);
});

Route::get('/dates',function(){
   $date = new DateTime('+1 week');
   echo $date->format('d-m-Y');

    echo '<br>';
    echo Carbon::now()->addDay(10)->diffForHumans();

    echo '<br>';
    echo Carbon::now()->subDay(10)->diffForHumans();

    echo '<br>';
    echo Carbon::now()->yesterday();
});
