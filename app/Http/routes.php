<?php 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
	return view('index');
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//

Route::get('/admin/', function() {
	return Redirect::to('/admin/login');
});

Route::get('/admin/login', 'AdminController@showLogin');
Route::get('/admin/manage', ['middleware' => 'auth', 'uses' => 'AdminController@showGalleries']);
Route::post('/admin/manage', ['middleware' => 'auth', 'uses' => 'AdminController@modifyGallery']);
Route::get('/admin/upload/{id?}', ['middleware' => 'auth', 'uses' => 'AdminController@showUpload']);
Route::post('/admin/upload', ['middleware' => 'auth', 'uses' => 'AdminController@attemptUpload']);
Route::get('/admin/photo/{id}', ['middleware' => 'auth', 'uses' => 'AdminController@viewPhoto']);
Route::post('/admin/photo/{id}', ['middleware' => 'auth', 'uses' => 'AdminController@editPhoto']);
Route::get('/admin/preview', ['middleware' => 'auth', 'uses' => 'AdminController@previewGallery']);
Route::get('/admin/edit-house/{id}', ['middleware' => 'auth', 'uses' => 'AdminController@viewHouse']);
Route::post('/admin/edit-house/{id}', ['middleware' => 'auth', 'uses' => 'AdminController@editHouse']);
Route::get('/admin/delete-photo/{id}', ['middleware' => 'auth', 'uses' => 'AdminController@confirmDeletePhoto']);
Route::post('/admin/delete-photo/{id}', ['middleware' => 'auth', 'uses' => 'AdminController@deletePhoto']);
Route::get('/admin/delete-house/{id}', ['middleware' => 'auth', 'uses' => 'AdminController@confirmDeleteHouse']);


Route::get('/about', function() {
	return view('about');
});

Route::get('/contact', 'ContactController@showForm');
Route::post('/contact', 'ContactController@processForm');

Route::get('/gallery/{filter?}', 'GalleryController@showGalleries');

Route::get('/house/{id}', 'HouseController@showHouse');
Route::get('/house/', function() {
	return Redirect::to('/gallery');	
});
