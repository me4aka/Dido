<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', array('as' => 'index', 'uses' => 'HomepageController@getCarouselImages'));
    Route::get('/contact',array('as'=>'contact', 'uses'=>'HomepageController@getContactInfo'));
    Route::post('/contact',array('as'=>'contact_store', 'uses'=>'HomepageController@storeContactInfo'));
    Route::get('/about',array('as'=>'about', 'uses'=>'HomepageController@getAbout'));
    Route::get('/admin', array('as' => 'admin', 'uses' => 'AlbumsController@getList'));
    Route::get('/admin/profile', array('as' => 'profile','uses' => 'ExtendedUserController@getProfile'));
    Route::get('/admin/editprofile', array('as' => 'edit_profile','uses' => 'ExtendedUserController@getEdit'));
    Route::patch('/admin/editprofile', array('as' => 'edit_profile','uses' => 'ExtendedUserController@patchUpdate'));
    Route::get('/admin/editprofilepic', array('as' => 'edit_profile_pic','uses' => 'ExtendedUserController@getPictureEdit'));
    Route::patch('/admin/editprofilepic', array('as' => 'edit_profile_pic','uses' => 'ExtendedUserController@patchPictureUpdate'));
    Route::get('/admin/createalbum', array('as'=>'create_album_form','uses'=>'AlbumsController@getForm'));
    Route::post('/admin/createalbum', array('as'=>'create_album','uses'=>'AlbumsController@postCreate'));
    Route::get('/admin/deletealbum/{id}', array('as'=>'delete_album','uses'=>'AlbumsController@getDelete'));
    Route::get('/admin/album/{id}', array('as'=>'show_album','uses'=>'AlbumsController@getAlbum'));
    Route::get('/admin/addimage/{id}', array('as' => 'add_image','uses' => 'ImagesController@getForm'));
    Route::post('/admin/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@postAdd'));
    Route::get('/admin/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImagesController@getDelete'));
    Route::get('/admin/editimage/{id}', array('as' => 'edit_image','uses' => 'ImagesController@getEdit'));
    Route::patch('/admin/editimage', array('as' => 'edit_image_of_album','uses' => 'ImagesController@patchUpdate'));
    Route::get('/{album_name}', array('as' => 'getGallery', 'uses' => 'HomepageController@getGallery'));
    Route::controllers([

        'auth'=>'Auth\AuthController',
        'password'=>'Auth\PasswordController',

    ]);
});