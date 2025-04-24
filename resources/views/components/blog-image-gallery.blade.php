@props(['images', 'containerClass' => '', 'imageClass' => ''])

<div class="{{ $containerClass }} grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($images as $image)
        <div class="relative group overflow-hidden rounded-lg">
            <img src="{{ $image->image_path }}" 
                 alt="Blog image" 
                 class="{{ $imageClass }} w-full h-64 object-cover transform group-hover:scale-105 transition-all duration-300">
            
            @if($image->is_featured)
                <div class="absolute top-2 right-2">
                    <span class="bg-indigo-600 text-white text-xs px-2 py-1 rounded-full">
                        Featured
                    </span>
                </div>
            @endif
        </div>
    @endforeach
</div> 