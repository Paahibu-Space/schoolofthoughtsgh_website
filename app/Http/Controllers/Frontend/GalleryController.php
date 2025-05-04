<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the gallery index page with all events
     */
    public function index()
    {
        // Get events with at least one gallery image, and count of images
        $events = Event::withCount('galleryImages')
            ->has('galleryImages')
            ->latest()
            ->paginate(9);
            
        return view('frontend.pages.gallery.index', compact('events'));
    }
    
    /**
     * Display gallery for a specific event
     */
    public function show($id)
    {
        $event = Event::with(['galleryImages' => function($query) {
            $query->orderBy('display_order', 'asc');
        }])->findOrFail($id);
        
        return view('frontend.pages.gallery.show', compact('event'));
    }
    
    /**
     * Display gallery with masonry layout
     */
    public function masonry($id)
    {
        $event = Event::with(['galleryImages' => function($query) {
            $query->orderBy('display_order', 'asc');
        }])->findOrFail($id);
        
        return view('frontend.pages.gallery.masonry', compact('event'));
    }
    
    /**
     * Display featured gallery images on homepage
     */
    public function featured()
    {
        $featuredImages = GalleryImage::where('is_featured', true)
            ->with('event')
            ->latest()
            ->take(6)
            ->get();
            
        return view('frontend.pages.gallery.featured', compact('featuredImages'));
    }
    
    /**
     * Display gallery carousel component
     */
    public function carousel($eventId = null)
    {
        if ($eventId) {
            // Get images from specific event
            $images = GalleryImage::where('event_id', $eventId)
                ->orderBy('display_order')
                ->take(8)
                ->get();
                
            $title = Event::find($eventId)->title ?? 'Event Gallery';
        } else {
            // Get featured or recent images across events
            $images = GalleryImage::where('is_featured', true)
                ->orWhereIn('id', function($query) {
                    $query->select('id')
                        ->from('gallery_images')
                        ->orderBy('created_at', 'desc')
                        ->limit(8);
                })
                ->with('event')
                ->take(8)
                ->get();
                
            $title = 'Featured Gallery';
        }
        
        return view('frontend.pages.gallery.carousel', compact('images', 'title'));
    }
}