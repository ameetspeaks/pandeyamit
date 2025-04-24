<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index(Request $request): View
    {
        $query = BlogPost::with('author', 'categories', 'tags', 'images')->latest();

        // Basic filtering (optional)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('category')) {
            $query->whereHas('categories', fn($q) => $q->where('blog_categories.id', $request->category));
        }

        $posts = $query->paginate(15);
        $categories = BlogCategory::orderBy('name')->pluck('name', 'id'); // For filter dropdown

        return view('admin.blog.posts.index', compact('posts', 'categories'));
    }

    public function create(): View
    {
        $categories = BlogCategory::orderBy('name')->pluck('name', 'id');
        $tags = BlogTag::orderBy('name')->pluck('name', 'id'); // Or get all tags for a tag input
        return view('admin.blog.posts.create', compact('categories', 'tags'));
    }

    private function storeImage($imageFile): string
    {
        // Get image info
        $imageInfo = getimagesize($imageFile->path());
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
                $sourceImage = imagecreatefromjpeg($imageFile->path());
                break;
            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($imageFile->path());
                break;
            case IMAGETYPE_GIF:
                $sourceImage = imagecreatefromgif($imageFile->path());
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

        // Generate filename
        $filename = 'blog/' . Str::random(40) . '.' . $imageFile->getClientOriginalExtension();
        $tempPath = tempnam(sys_get_temp_dir(), 'img');

        // Save image based on type
        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($newImage, $tempPath, 90);
                break;
            case IMAGETYPE_PNG:
                imagepng($newImage, $tempPath, 9);
                break;
            case IMAGETYPE_GIF:
                imagegif($newImage, $tempPath);
                break;
        }

        // Store the resized image
        Storage::disk('public')->put($filename, file_get_contents($tempPath));

        // Clean up
        imagedestroy($sourceImage);
        imagedestroy($newImage);
        unlink($tempPath);

        return $filename;
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts',
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:160',
            'status' => 'required|in:draft,published',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:blog_categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:blog_tags,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'featured_image_index' => 'nullable|integer',
        ]);

        $validated['author_id'] = Auth::id();

        $post = BlogPost::create($validated);

        // Handle Categories
        if ($request->filled('category_ids')) {
            $post->categories()->sync($request->input('category_ids'));
        }

        // Handle Tags
        if ($request->filled('tag_ids')) {
            $post->tags()->sync($request->input('tag_ids'));
        }

        // Handle Images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('blog', 'public');
                $post->images()->create([
                    'image_url' => $path,
                    'is_featured' => $key === 0,
                    'display_order' => $key + 1,
                ]);
            }
        }

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $post): View
    {
        $categories = BlogCategory::orderBy('name')->pluck('name', 'id');
        $tags = BlogTag::orderBy('name')->pluck('name', 'id');
        $post->load('categories', 'tags', 'images'); // Eager load relationships
        return view('admin.blog.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, BlogPost $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . $post->id,
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:160',
            'status' => 'required|in:draft,published',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:blog_categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:blog_tags,id',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'featured_image_id' => 'nullable|exists:blog_images,id,blog_post_id,' . $post->id,
        ]);

        $post->update($validated);

        // Sync Categories
        $post->categories()->sync($request->input('category_ids', []));

        // Sync Tags
        $post->tags()->sync($request->input('tag_ids', []));

        // Handle New Images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('blog', 'public');
                $post->images()->create([
                    'image_url' => $path,
                    'is_featured' => false,
                    'display_order' => $post->images->max('display_order') + 1,
                ]);
            }
        }

        // Handle Setting Featured Image
        if ($request->filled('featured_image_id')) {
            $post->images()->update(['is_featured' => false]); // Unset others
            BlogImage::where('id', $request->featured_image_id)->update(['is_featured' => true]);
        }

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post): RedirectResponse
    {
        // Delete associated images
        foreach ($post->images as $image) {
            $this->deleteImageFile($image->image_url);
        }
        // Detach relationships (optional, handled by cascade?)
        // $post->categories()->detach();
        // $post->tags()->detach();
        // $post->images()->delete();
        
        $post->delete();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    public function deleteImage(Request $request): RedirectResponse
    {
        $request->validate(['image_id' => 'required|exists:blog_images,id']);
        $image = BlogImage::findOrFail($request->image_id);

        $this->deleteImageFile($image->image_url);
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    private function deleteImageFile(string $imageUrl): void
    {
        if ($imageUrl && Storage::disk('public')->exists($imageUrl)) {
            Storage::disk('public')->delete($imageUrl);
        }
    }

    // Helper function if using string input for tags (e.g., from a tagify input)
    /*
    private function syncTagsFromString(BlogPost $post, string $tagString): void
    {
        $tagNames = collect(explode(',', $tagString))
            ->map(fn($name) => trim($name))
            ->filter(); // Remove empty tags
        
        $tags = $tagNames->map(function ($name) {
            return BlogTag::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        });

        $post->tags()->sync($tags->pluck('id'));
    }
    */
} 