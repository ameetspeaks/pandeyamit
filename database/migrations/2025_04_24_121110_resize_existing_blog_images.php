<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Models\BlogImage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $images = BlogImage::all();

        foreach ($images as $image) {
            try {
                // Check if the image exists
                if (!Storage::disk('public')->exists($image->image_url)) {
                    continue;
                }

                // Create a temporary file
                $tempOriginal = tempnam(sys_get_temp_dir(), 'orig');
                file_put_contents($tempOriginal, Storage::disk('public')->get($image->image_url));

                // Get image info
                $imageInfo = getimagesize($tempOriginal);
                $width = $imageInfo[0];
                $height = $imageInfo[1];
                $type = $imageInfo[2];

                // Calculate new dimensions (600x600 max, maintaining aspect ratio)
                $maxDimension = 600;
                $newWidth = $width;
                $newHeight = $height;

                if ($width > $maxDimension || $height > $maxDimension) {
                    if ($width > $height) {
                        $newWidth = $maxDimension;
                        $newHeight = intval($height * ($maxDimension / $width));
                    } else {
                        $newHeight = $maxDimension;
                        $newWidth = intval($width * ($maxDimension / $height));
                    }
                }

                // Create new image
                $newImage = imagecreatetruecolor($newWidth, $newHeight);

                // Handle transparency for PNG images
                if ($type === IMAGETYPE_PNG) {
                    imagealphablending($newImage, false);
                    imagesavealpha($newImage, true);
                    $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
                    imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
                }

                // Create source image based on type
                switch ($type) {
                    case IMAGETYPE_JPEG:
                        $sourceImage = imagecreatefromjpeg($tempOriginal);
                        break;
                    case IMAGETYPE_PNG:
                        $sourceImage = imagecreatefrompng($tempOriginal);
                        break;
                    case IMAGETYPE_GIF:
                        $sourceImage = imagecreatefromgif($tempOriginal);
                        break;
                    default:
                        throw new \Exception('Unsupported image type');
                }

                // Resize image
                imagecopyresampled(
                    $newImage,
                    $sourceImage,
                    0, 0, 0, 0,
                    $newWidth,
                    $newHeight,
                    $width,
                    $height
                );

                // Create temporary file for resized image
                $tempResized = tempnam(sys_get_temp_dir(), 'resized');

                // Save image based on type
                switch ($type) {
                    case IMAGETYPE_JPEG:
                        imagejpeg($newImage, $tempResized, 90);
                        break;
                    case IMAGETYPE_PNG:
                        imagepng($newImage, $tempResized, 9);
                        break;
                    case IMAGETYPE_GIF:
                        imagegif($newImage, $tempResized);
                        break;
                }

                // Store the resized image
                Storage::disk('public')->put($image->image_url, file_get_contents($tempResized));

                // Clean up
                imagedestroy($sourceImage);
                imagedestroy($newImage);
                unlink($tempOriginal);
                unlink($tempResized);

            } catch (\Exception $e) {
                // Log error but continue with other images
                \Log::error("Error resizing image {$image->id}: " . $e->getMessage());
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cannot revert image resizing
    }
};
