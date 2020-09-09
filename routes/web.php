<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    //return view('welcome');
//    return "Hey you";
//});
//Route::get('admin/posts/example',array('as' => 'admin.home',function(){
//    $url = route('admin.home');
//    return "This url is".$url;
//
//}));
//Route::resource('posts','PostsController');
//Route::get('/contact','PostsController@contact');
//Route::get('post/{id}/{name}/{password}','PostsController@show_post');
//Route::group(['middleware' => ['web']],function(){
//
//});
/***
 * Database row sql queries
 */
Route::get('/insert', function () {
    DB::insert('insert into posts (title, content) values(?,?)', [
        'Laravel is awesome with Edwin', 'laravel is the best thing that has happened period'
    ]);
});
//Route::get('/read',function (){
//    $results = DB::select('select * from posts where id=? ',[1]);
//    foreach($results as $post){
//        return $post->title;
//    }
//});
//Route::get('update',function (){
//   $updated = DB::update('update posts set title = "updated Title" where id=?',[1]);
//   return $updated;
//});
//Route::get('/delete',function (){
//   $deleted = DB::delete('delete from posts where id = ?',[1]);
//   return $deleted;
//});
//section 10
/***
 * Eloquent = Object relational model = ORM
 */
//Route::get('/read', function () {
//    $posts = Post::all();
//    foreach ($posts as $post) {
//        return $post->title;
//    }
//});
//Route::get('/find', function () {
//    $post = Post::find(2);
//    return $post->title;
//
//});
//Route::get('/findwhere',function (){
//    return $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//
//});
//Route::get('/findmore',function (){
//    return $posts = Post::findOrFail(2);
//
//});
//start:lecture 10.54
Route::get('/basicInsert', function () {
    $post = new Post;
    $post->title = 'new Eloquent title';
    $post->content = 'Wow! eloquent is really cool';
    $post->save();

});
//Route::get('/basicUpdate',function (){
//    $post = Post::findOrFail(2);
//    $post->title = 'new Eloquent title 2';
//    $post->content = 'Wow! eloquent is really cool 2';
//    $post->save();
//});
//end:lecture 10.54
//start lecture 10.55
Route::get('/create', function () {
    Post::create(['title' => 'the create method 1', 'content' => 'Wow! I\'m learning eloquent1']);
});
//end lecture 10.55
//start lecture 10.56
//Route::get('/update',function (){
//    Post::where('id',2)->where('is_admin',0)->update([
//        "title" => "NEW PHP TITLE",
//        "content" => "I love my instructor Edwin"
//    ]);
//});
//end lecture 10.56
//start lecture 10.57
//Route::get('/delete',function (){
//    $post = POST::find(2);
//    $post->delete();
//
//});
//Route::get('/delete2',function (){
//   //Post::destroy(3);
//    Post::destroy([4,5]);
//});
//end lecture 10.57
//start lecture 10.58
Route::get('/softdelete', function () {
    Post::find(1)->delete();
});
////end lecture 10.58
//Route::get('/readsoftdelete', function () {
//    //return $post = Post::find(1);
//    return Post::onlyTrashed()->where('is_admin',0)->get();
//    //Post::withTrashed()
//
//});
//Route::get('/restore',function (){
//    Post::withTrashed()->where('is_admin',0)->restore();
//});
Route::get('/forcedelete',function (){
    Post::onlyTrashed()->where('is_admin',0)->forceDelete();
});
/***
 * ELOQUENT RELATIONSHIPS
 */
//One to One relationship
Route::get('/user/{id}/post',function ($id){
   return User::find($id)->post->content;
});
Route::get('/post/{id}/user',function ($id){
    return Post::find($id)->user->name;
});
//One to many relationship
Route::get('/posts',function (){
    $user = User::find(1);
    foreach($user->posts as $post){
        echo  $post->title."<br>";//if we use return just one of the posts is returned
    }
});
//Many to Many relationship
Route::get('/user/{id}/role',function ($id){
//    $user = User::find($id);
//    foreach($user->roles as $role){
//        return $role->name;
//    }
    return User::find($id)->roles()->orderBy('id','desc')->get();
});
//Accessing the intermediate table(user_role)/pivot
Route::get('/user/pivot',function (){
    $user = User::find(1);
    foreach($user->roles as $role){
       return $role->pivot->created_at;
    }
});
Route::get('/user/country',function (){
    $country = Country::find(1);
    foreach($country->posts as $post){
        return $post->title;
    }
});
//polymorphic relations
Route::get('/user/{id}/photos',function($id){
    $user = User::find($id);
    foreach($user->photos as $photo){
        echo $photo->path."<br>";
    }//we can change user to post because we have photos relation for posts too...
});
//polymetric relations reverse
Route::get('/photo/{id}/post',function($id){
    $photo = Photo::findOrFail($id);
    return $photo->imageable;//with this you can find a post or a user that these photo belongs to

});

//Polymorphic many to  many
Route::get('/post/tag',function(){
    $post = Post::find(1);
    foreach($post->tags as $tag){
        echo $tag->name;
    }
});
Route::get('/tag/post',function(){
   $tag = Tag::find(2);
   foreach($tag->posts as $post){
       echo $post->title;
   }
});




