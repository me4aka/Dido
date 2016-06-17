<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AlbumsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getList()
    {
        $albums = Album::with('Photos')->get();
        return View::make('images.admin')->with('albums',$albums);
    }

    public function getAlbum($id)
    {
        $album = Album::with('Photos')->find($id);
        return View::make('images.album')->with('album',$album);
    }


    public function getForm()
    {
        return View::make('images.createalbum');
    }

    public function postCreate()
    {
        $rules = array(

            'name' => 'required',
            'cover_image' => 'required|image'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::route('create_album_form')
                ->withErrors($validator)
                ->withInput();
        }

        $file = Input::file('cover_image');
        $random_name = str_random(8);
        $destinationPath = public_path('albums');
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name.'_cover.'.$extension;
        $uploadSuccess = Input::file('cover_image')
            ->move($destinationPath, $filename);
        $album = Album::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'cover_image' => $filename
        ));

        return Redirect::route('show_album', array('id' => $album->id));
    }

    public function getDelete($id)
    {
        $album = Album::find($id);
        $album->delete();

        return Redirect::route('admin');
    }
}