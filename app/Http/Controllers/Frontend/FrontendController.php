<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\GalleryImage;

class FrontendController extends Controller
{
    public function index() {
        $events = Event::withCount('galleryImages')
            ->has('galleryImages')
            ->latest()
            ->paginate(9);

            $featuredImages = GalleryImage::where('is_featured', true)
            ->with('event')
            ->latest()
            ->take(6)
            ->get();
            
        return view('frontend.pages.index', compact('events', 'featuredImages'));
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
