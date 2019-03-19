<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("category",function(){
    $category = \App\Category::orderBy('name',"DESC")->get();
    return response()->json($category); 
});
Route::get("location",function(){
    $locations = \App\Location::orderBy('name',"DESC")->get();
    return response()->json($locations); 
});
Route::any("getBook",function(Request $request){
    $book = \App\Book::find($request->input('id'));
    if(!$book)
    return response()->json(); 
    $category = \App\CategoryRelation::where('book_id','=',$book->id)->get(['category_id']);
    $data['book'] = $book;
    $data['category'] = $category;
    return response()->json($data); 
});


/*
Route::match(['get', 'post'],'login', 'Users@login');
*//*Route::match(['get', 'post'],'register', 'Users@register');*/