<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ExtendedUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProfile()
    {
        $user = Auth::user();
        return View::make('images.profile')
            ->with('user',$user);
    }

    public function getEdit()
    {
        $user = Auth::user();

        return view('images.editprofile')
            ->with('user',$user);
    }

    public function patchUpdate()
    {
        $user = Auth::user();

        $rules = array(
            'contact_mail' => 'email',
            'url_1' => 'url',
            'url_2' => 'url',
            'url_3' => 'url',
        );

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails())
        {
            return Redirect::route('edit_profile')
                ->withErrors($validator)
                ->withInput();
        }

        $user->update(array(

            'about_me'=>Input::get('about_me'),
            'contact_mail'=>Input::get('contact_mail'),
            'address'=>Input::get('address'),
            'tel'=>Input::get('tel'),
            'mobile'=>Input::get('mobile'),
            'url_1'=>Input::get('url_1'),
            'url_2'=>Input::get('url_2'),
            'url_3'=>Input::get('url_3')
        ));

        return Redirect::route('profile');
    }

    public function getPictureEdit()
    {
        $user = Auth::user();

        return view('images.editprofilepic')
            ->with('user',$user);
    }

    public function patchPictureUpdate()
    {
        $user = Auth::user();

        $rules = array(
            'profile_pic' => 'image'
        );

        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails())
        {
            return Redirect::route('edit_profile')
                ->withErrors($validator)
                ->withInput();
        }

        $file = Input::file('profile_pic');
        if ($file)
        {
            $random_name = str_random(8);
            $destinationPath = 'profile_pics/';
            $extension = $file->getClientOriginalExtension();
            $filename = $random_name.$extension;
            $uploadSuccess = Input::file('profile_pic')->move($destinationPath, $filename);
        } else
        {
            $filename=null;
        }

        $user->update(array(

            'profile_pic'=>$filename,
        ));

        return Redirect::route('profile');
    }

}
