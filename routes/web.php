<?php

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
Route::group(["middleware" => "web"],function(){
	Route::get('/', "HomeController@index")->name("homeRoot");
	Route::get("/category","Category@Index")->name("categories");
	Route::get('/category/{id}',"Category@BooksByCetegory")->name("category");
	Route::get('/book/{id}',"Page@Book")->name("book");
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/books', 'Page@Books')->name('books');
	Route::get('/about', 'Page@About')->name('about');
	Route::get('/contact', 'Page@contact')->name('contact');
	Route::get('/search', 'Page@search')->name('search');
	Route::post('/registerAjax', 'Users@register')->name("ajaxRegister");
	Route::post('/loginAjax', 'Users@login')->name("ajaxLogin");
	Route::get('/logout', 'Users@logout')->name("ajaxLogin");

	// Api
	route::group(['prefix'=>'ajax'],function(){

		Route::get("/getUser","Api\User@getProfile");
		Route::post("/deleteBook","Api\User@DeleteBook");
		Route::any("/user/update","Api\User@updateUser");
		Route::any("/bookUpload","Api\User@BookUpload");
		Route::any("/bookUpdate","Api\User@bookUpdate");
		Route::any("/user/books","Api\User@Books");
	});

});
Auth::routes();



Route::group(
	[
		'middleware' => ['auth','web'],
		'prefix'	=> "admin"
	],
	function(){
		Route::get("/","admin\Admin@index")->name("admin.dashboard");
		Route::post("/category/create","admin\Books@CreateCategory")->name("admin.createCategory");
		Route::any("/category","admin\Books@category")->name("admin.bookcategory");
		Route::get("/category/edit/{id}","admin\Books@EditCategory")->name("admin.editCategory");
		Route::any("/categoryDelete/{id}","admin\Books@DeleteCategory")->name("admin.deleteCategory");
		Route::get("/locations","admin\Books@index")->name("admin.locations");
		Route::get("/users","admin\Admin@Users")->name("admin.users");
		Route::get("/users/{id}","admin\Admin@DeleteUser")->name("admin.reauesteDeleteUser");
		//Book
		Route::get("/books","admin\Books@index")->name("admin.booklist");
		Route::get("/add-book","admin\Books@AddBook")->name("admin.createBook");
		Route::get("/edit-book/{id}","admin\Books@EditBook")->name("admin.editBook");
		Route::post("/requestCreateBook","admin\Books@RequestNewBook")->name("admin.requestCreateBook");
		Route::get("/requestDeleteBook/{id}","admin\Books@ReauesteDeleteBook")->name("admin.reauesteDeleteBook");
		Route::post("/requestEditBook","admin\Books@RequestEditBook")->name("admin.requestEditBook");
		// Locations
		Route::get("/locations","Locations@index")->name("admin.locations");
		Route::get("/locations/delete/{id}","Locations@Delete")->name("admin.locationDelete");
		Route::post("/locations/create","Locations@Create")->name("admin.locationCreate");


	}
);


Route::group(
	[
		"middleware" => ["auth","web"],
		"prefix" => "myaccount",
	],
	function(){
		Route::get("/dashboard",function(){
			return view('users.dashboard');
		})->name("userDashboard");

		Route::get("/profile",function(){
			return view('users.profile');
		})->name("userProfile");

		Route::get("/editbook/{id}",function(){
			return view('users.profile');
		})->name("userProfile");

		Route::get("/downloads",function(){
			return view('users.profile');
		})->name("userDownloads");

		Route::get("/upload",function(){
			return view('users.profile');
		})->name("userUpload");

		/*Route::group([
				"prefix" => "upload"
			],
			function(){
				Route::get("/",function(){
					return view("users.upload_list");
				})->name("usreFileList");

				Route::get("/details",function(){
					return view("users.uploadform");
				})->name("usreUploadForm");

				Route::get("/new",function(){
					return view("users.new");
				})->name("usreUploadForm");

				Route::get("/delete",function(){
					return view("users.delete");
				})->name("usreUploadForm");
			}
		);*/
	}
);