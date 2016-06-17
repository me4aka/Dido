<?php

namespace App\Http\Controllers;

use App\Album;
use App\Images;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ImagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getForm($id)
    {
        $album = Album::find($id);
        return View::make('images.addimage')
            ->with('album',$album);
    }

    public function postAdd()
    {
        $rules = array(
            'title' => 'required',
            'album_id' => 'required|numeric|exists:albums,id',
            'image' => 'required|image'
        );

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails())
        {
            return Redirect::route('add_image', array('id'=>Input::get('album_id')))
                ->withErrors($validator)
                ->withInput();
        }

        $file = Input::file('image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name.'_album_image.'.$extension;
        $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
        Images::create(array(
            'title'=>Input::get('title'),
            'description'=>Input::get('description'),
            'image'=>$filename,
            'album_id' => Input::get('album_id'),
            'carousel' => Input::get('carousel')
        ));

        return Redirect::route('show_album',array('id'=>Input::get('album_id')));
    }

    public function getDelete($id)
    {
        $image = Images::find($id);
        $image->delete();
        return Redirect::route('show_album',array('id'=>$image->album_id));
    }

    public function getEdit($id)
    {
        $image = Images::findOrFail($id);
        $albums = Album::all();
        return view('images.editimage')
            ->with('image',$image)
            ->with('albums',$albums);
    }

    public function patchUpdate()
    {
        $image = Images::findOrFail(Input::get('id'));

        $rules = array(
            'title' => 'required',
            'id' => 'required',
            'album_id'=>'required',
        );

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails())
        {
            return Redirect::route('edit_image', array('id'=>Input::get('id')))
                ->withErrors($validator)
                ->withInput();
        }

        $image->update(array(
            'title'=>Input::get('title'),
            'description'=>Input::get('description'),
            'image'=>Input::get('image'),
            'album_id'=>Input::get('album_id'),
            'carousel' => Input::get('carousel')
        ));

        return Redirect::route('show_album',array('id'=>Input::get('album_id')));
    }
}
