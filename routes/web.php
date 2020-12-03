<?php

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

Route::get('/home','HomeController@index');

Route::get('categorylistview','HomeController@categorylist');
Route::any('searchlist','HomeController@searchlist');
Route::get('searchlistview','HomeController@searchlistview');
//Route::post('deliverydetails','HomeController@deliverydetails')->name('deliveryDetails');
Route::any('deliverydetails','HomeController@deliverydetails')->name('deliverydetails');
//Route::get('deliverydetails/{id}','HomeController@deliverydetails');
Route::post('storereview','HomeController@store');
Route::post('storecomment','BlogController@store');
Route::post('deliveryreview','HomeController@deliveryreview');
Route::get('about','AboutController@about');
Route::get('blog','BlogController@blog');
Route::any('blogdetail','BlogController@blogdetail')->name('blogdetail');
Route::get('forum','ForumController@forum');
Route::post('forumquestion','ForumController@forumquestion');
Route::any('forumtopic','ForumController@forumtopic')->name('forumtopic'); 
Route::any('singlequestion','ForumController@singlequestion')->name('singlequestion');
Route::post('storeforumcomment','ForumController@store');
Route::get('trainingroom','TrainingRoomController@index');
Route::post('videoshow','TrainingRoomController@videoshow');
Route::get('event','EventController@index')->name('event');
Route::get('eventdetail/{id}','EventController@eventdetail')->name('eventdetail');
Route::get('speakerdetail/{id}','EventController@speakerdetail')->name('speakerdetail');
Route::get('servicedetails','ServiceController@servicedetails');
Route::get('login','HomeController@login');
Route::get('register','HomeController@register');
