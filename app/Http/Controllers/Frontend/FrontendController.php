<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\GalleryImage;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Partner;
use App\Models\TeamMember;
use App\Models\Story;

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

            $blogs = Blog::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(6);

            $stories = Story::where('published_at', '<=', Carbon::now())
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

            $blogs = Blog::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(6);

            $upcomingEvents = Event::upcoming()
            ->orderBy('start_date')
            ->paginate(6, ['*'], 'upcoming_page');

        $pastEvents = Event::past()
            ->orderBy('start_date', 'desc')
            ->paginate(6, ['*'], 'past_page');

             // Featured blogs (limit to 3)
        $featuredBlogs = Blog::where('is_featured', true)
        ->where('published_at', '<=', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->take(3)
        ->get();
            
        return view('frontend.pages.index', compact('events', 'featuredImages', 'blogs', 'stories', 'featuredBlogs', 'upcomingEvents', 'pastEvents'));
    }

    public function about() {
        $teamMembers = TeamMember::where('is_active', true)
                    ->orderBy('display_order')
                    ->get();

                    $partners = Partner::orderBy('name')->get();

                    $impactData = [
                        'students' => 5000,   // Replace with actual count from database
                        'schools' => 50,      // e.g.: School::count()
                        'regions' => 10,      // e.g.: Region::count()
                        'volunteers' => 200   // e.g.: Volunteer::count()
                    ];

        return view('frontend.pages.about', compact('teamMembers', 'partners', 'impactData'));
    }

    /**
     * Display all blogs
     */
    public function blogs()
    {
        $blogs = Blog::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view('frontend.pages.blogs.index', compact('blogs'));
    }

    /**
     * Display a single blog
     */
    public function showBlog($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('published_at', '<=', Carbon::now())
            ->firstOrFail();

        // Related blogs (same author or similar tags could be added later)
        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.blog.show', compact('blog', 'relatedBlogs'));
    }

    /**
     * Display all events
     */
    public function events()
    {
        $upcomingEvents = Event::upcoming()
            ->orderBy('start_date')
            ->paginate(6, ['*'], 'upcoming_page');

        $pastEvents = Event::past()
            ->orderBy('start_date', 'desc')
            ->paginate(6, ['*'], 'past_page');

            $featuredImages = GalleryImage::where('is_featured', true)
            ->with('event')
            ->latest()
            ->take(6)
            ->get();

            $blogs = Blog::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(6);

            $stories = Story::where('published_at', '<=', Carbon::now())
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

            $partners = Partner::orderBy('name')->get();

            $featuredBlogs = Blog::where('is_featured', true)
        ->where('published_at', '<=', Carbon::now())
        ->orderBy('published_at', 'desc')
        ->take(3)
        ->get();


        return view('frontend.pages.event.index', compact('upcomingEvents', 'pastEvents', 'featuredImages', 'blogs', 'stories', 'partners', 'featuredBlogs'));
    }

    /**
     * Display a single event
     */
    public function showEvent($id)
    {
        $event = Event::with('galleryImages')->findOrFail($id);
        $recentEvents = Event::where('id', '!=', $id)
        ->orderBy('start_date', 'desc')
        ->take(4)
        ->get();

        return view('frontend.pages.event.event-single', compact('event', 'recentEvents'));
    }

    /**
     * Display all stories
     */
    public function stories()
    {
        $stories = Story::where('published_at', '<=', Carbon::now())
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view('frontend.pages.stories.index', compact('stories'));
    }

    /**
     * Display a single story
     */
    public function showStory($slug)
    {
        $story = Story::where('slug', $slug)
            ->where('published_at', '<=', Carbon::now())
            ->with('author')
            ->firstOrFail();

        // Related stories
        $relatedStories = Story::where('id', '!=', $story->id)
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('stories.show', compact('story', 'relatedStories'));
    }

    /**
     * Display the partners page
     */
    public function partners()
    {
        $partners = Partner::orderBy('name')->get();

        return view('partners', compact('partners'));
    }

    /**
     * Display the team page
     */
    public function team()
    {
        $teamMembers = TeamMember::getActiveMembers();

        return view('frontend.pages.team', compact('teamMembers'));
    }
}
