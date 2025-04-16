<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        return view('frontend.pages.index');
    }

    public function about() {
        return view('frontend.pages.about');
    }

    public function events() {
        return view('frontend.pages.event.events');
    }

    public function team() {
        return view('frontend.pages.team');
    }

    public function singleEvent() {
        return view('frontend.pages.eventsdetails');
    }

    public function gallery() {
        return view('frontend.pages.gallerypage1');
    }
}
