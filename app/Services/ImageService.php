<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Store an image in WebP format with optional resizing
     *
     * @param UploadedFile $image
     * @param string $path
     * @param bool $resize
     * @param int $width
     * @param int|null $height
     * @param int $quality
     * @return string
     */
    public function storeImage(
        UploadedFile $image,
        string $path = 'gallery',
        bool $resize = true,
        int $width = 1200,
        int $height = null,
        int $quality = 80
    ): string {
        // Generate a WebP filename
        $imageName = Str::random(20) . '.webp';
        $fullPath = $path . '/' . $imageName;

        // Create image instance
        $img = Image::make($image->getRealPath());

        // Resize if enabled
        if ($resize) {
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // Encode as WebP
        $img->encode('webp', $quality);

        // Store the image
        Storage::disk('public')->put($fullPath, (string)$img);

        return $fullPath;
    }

    /**
     * Create a WebP thumbnail of an image
     *
     * @param string $imagePath
     * @param string $thumbnailPath
     * @param int $width
     * @param int $height
     * @param int $quality
     * @return string
     */
    public function createThumbnail(
        string $imagePath,
        string $thumbnailPath = 'gallery/thumbnails',
        int $width = 300,
        int $height = 300,
        int $quality = 80
    ): string {
        // Get image contents
        $imageContent = Storage::disk('public')->get($imagePath);

        // Create image instance
        $img = Image::make($imageContent);

        // Generate WebP thumbnail name
        $baseName = pathinfo($imagePath, PATHINFO_FILENAME);
        $thumbnailName = $baseName . '.webp';
        $thumbnailFullPath = $thumbnailPath . '/' . $thumbnailName;

        // Fit and encode to WebP
        $img->fit($width, $height);
        $img->encode('webp', $quality);

        // Store thumbnail
        Storage::disk('public')->put($thumbnailFullPath, (string)$img);

        return $thumbnailFullPath;
    }

    /**
     * Delete image and corresponding thumbnail
     *
     * @param string $imagePath
     * @param string $thumbnailPath
     * @return bool
     */
    public function deleteImage(
        string $imagePath,
        string $thumbnailPath = 'gallery/thumbnails'
    ): bool {
        // Get base filename (no extension)
        $baseName = pathinfo($imagePath, PATHINFO_FILENAME);

        // Construct full thumbnail path
        $thumbnailFullPath = $thumbnailPath . '/' . $baseName . '.webp';

        // Delete thumbnail if exists
        if (Storage::disk('public')->exists($thumbnailFullPath)) {
            Storage::disk('public')->delete($thumbnailFullPath);
        }

        // Delete the main image
        return Storage::disk('public')->delete($imagePath);
    }
}
