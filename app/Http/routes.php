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

Route::get('/', 'PagesController@homepage');

Route::get('about', 'PagesController@about');

Route::get('halaman-rahasia', ['as'=>'secret', 'uses' => 'RahasiaController@halamanRahasia']);

Route::get('showmesecret', 'RahasiaController@showMeSecret');

Route::group(['midleware' => ['web']], function(){
	//Route::get('siswa', 'SiswaController@index');
	//Route::get('siswa/create', 'SiswaController@create');
	//Route::get('siswa/{siswa}', 'SiswaController@show');
	//Route::post('siswa', 'SiswaController@store');
	//Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
	//Route::patch('siswa/{siswa}', 'SiswaController@update');
	//Route::delete('siswa/{siswa}', 'SiswaController@destroy');

	//route untuk melakukan pencarian
	Route::get('siswa/cari', 'SiswaController@cari');

	//kode di bawah merupakan REST Full controller
	/*
		* Syarat menggunakan REST Full Controller adalah kita harus mempunyai method
		* index(), create(), store(), show(), edit(), update(), destroy()
		* kita bisa menghapus beberapa baris Route, dan menggantinya dengan pattern berikut
		* Route::resource('User', 'UserController');
	*/
	Route::resource('siswa', 'SiswaController');
});

Route::get('test_colletion', 'SiswaController@testColletion');