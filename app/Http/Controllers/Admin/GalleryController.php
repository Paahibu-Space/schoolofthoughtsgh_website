<?php
// app/Http/Controllers/Admin/GalleryController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\GalleryImage;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * The image service instance.
     */
    protected $imageService;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    /**
     * Display gallery management dashboard
     */
    public function index()
    {
        $events = Event::withCount('galleryImages')->latest()->paginate(10);
        return view('admin.gallery.index', compact('events'));
    }
    
    /**
     * Show gallery images for a specific event
     */
    public function showEventGallery($eventId)
    {
        $event = Event::with('galleryImages')->findOrFail($eventId);
        return view('admin.gallery.event', compact('event'));
    }
    
    /**
     * Show form to add images to an event
     */
    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('admin.gallery.create', compact('event'));
    }
    
   /**
 * Store new gallery images
 */
public function store(Request $request, $eventId)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'titles.*' => 'nullable|string|max:255',
        'descriptions.*' => 'nullable|string',
    ]);
    
    $event = Event::findOrFail($eventId);
    $lastOrder = $event->galleryImages()->max('display_order') ?? 0;
    $imagesAdded = 0;
    
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $key => $image) {
            // Store the image using our ImageService
            $imagePath = $this->imageService->storeImage(
                $image, 
                'gallery',
                true,  // resize
                1600   // max width
            );
            
            // Create a thumbnail (optional but useful for performance)
            $thumbnailPath = $this->imageService->createThumbnail($imagePath);
            
            $lastOrder++;
            
            GalleryImage::create([
                'event_id' => $eventId,
                'title' => $request->input('titles.' . $key, null),
                'description' => $request->input('descriptions.' . $key, null),
                'image_path' => $imagePath,
                'display_order' => $lastOrder,
            ]);
            
            $imagesAdded++;
        }
    }
    
    // If this is an AJAX request, return JSON
    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => $imagesAdded . ' images uploaded successfully.',
            'redirect' => route('admin.gallery.event', $eventId)
        ]);
    }
    
    // For non-AJAX requests, redirect with flash message
    return redirect()->route('admin.gallery.event', $eventId)
        ->with('success', $imagesAdded . ' images uploaded successfully.');
}
    
    /**
     * Show form to edit a gallery image
     */
    public function edit($id)
    {
        $image = GalleryImage::findOrFail($id);
        return view('admin.gallery.edit', compact('image'));
    }
    
    /**
     * Update gallery image
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $image = GalleryImage::findOrFail($id);
        
        if ($request->hasFile('image')) {
            // Delete old image and thumbnail
            $this->imageService->deleteImage($image->image_path);
            
            // Store new image
            $imagePath = $this->imageService->storeImage(
                $request->file('image'),
                'gallery',
                true,  // resize
                1600   // max width
            );
            
            // Create a thumbnail
            $thumbnailPath = $this->imageService->createThumbnail($imagePath);
            
            $image->image_path = $imagePath;
        }
        
        $image->title = $request->title;
        $image->description = $request->description;
        $image->is_featured = $request->has('is_featured');
        $image->save();
        
        return redirect()->route('admin.gallery.event', $image->event_id)
            ->with('success', 'Image updated successfully.');
    }
    
    /**
     * Delete gallery image
     */
    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);
        $eventId = $image->event_id;
        
        // Delete image file and thumbnail
        $this->imageService->deleteImage($image->image_path);
        
        // Delete database record
        $image->delete();
        
        return redirect()->route('admin.gallery.event', $eventId)
            ->with('success', 'Image deleted successfully.');
    }
    
    /**
     * Update display order of gallery images
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'integer|exists:gallery_images,id',
        ]);
        
        foreach ($request->images as $index => $id) {
            GalleryImage::where('id', $id)->update(['display_order' => $index]);
        }
        
        return response()->json(['success' => true]);
    }
}