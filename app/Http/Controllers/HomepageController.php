<?php

namespace App\Http\Controllers;

use App\Album;
use App\Images;
use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\DocBlock\Tag\ReturnTag;

class HomepageController extends Controller
{
    public function getGallery($album_name)
    {
        $albums = Album::with('Photos')->get()->where('name', $album_name);

        return View::make('images.gallery')->with('albums',$albums);
    }

    public function getCarouselImages(){

        $images = Images::where('carousel', 1)->take(3)->get();
        $mainimages = Images::where('carousel', 1)->orderBy('updated_at','desc')->take(1)->get();

        return View::make('images.index')->with('images',$images)
                                          ->with('mainimages',$mainimages);
    }

    public function getAbout()
    {
        $user = User::find(1);

        return View::make('images.about')->with('user',$user);
    }

    public function getContactInfo()
    {
        $user = User::find(1);

        return View::make('images.contact')->with('user',$user);
    }

    public function storeContactInfo(ContactFormRequest $request)
    {
        Mail::send('images.contactmail', array('name'=>$request->get('name'),
                                            'email'=>$request->get('email'),
                                            'user_message'=>$request->get('message')),
                                    function($message)
                                    {
                                        $message->from('boev.pavel@gmail.com');
                                        $message->to('boev.pavel@gmail.com','Admin')->subject('Feedback');
                                    });

        return Redirect::route('contact')->with('message','Thanks for contacting me!');
    }
}

