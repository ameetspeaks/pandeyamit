@props(['project' => null, 'categories'])

<form action="{{ $project ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">
    @csrf
    @if($project)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <!-- Title -->
        <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1">
                <input type="text" name="title" id="title"
                       value="{{ old('title', $project?->title) }}"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div class="sm:col-span-3">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
            <div class="mt-1">
                <select name="category_id" id="category_id"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ old('category_id', $project?->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div class="sm:col-span-3">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <div class="mt-1">
                <select name="status" id="status"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    <option value="ongoing" {{ old('status', $project?->status) == 'ongoing' ? 'selected' : '' }}>
                        Ongoing
                    </option>
                    <option value="completed" {{ old('status', $project?->status) == 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>
            </div>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="sm:col-span-6">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <div class="mt-1">
                <textarea name="description" id="description" rows="5"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('description', $project?->description) }}</textarea>
            </div>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Technologies Used -->
        <div class="sm:col-span-6">
            <label for="technologies_used" class="block text-sm font-medium text-gray-700">
                Technologies Used (comma-separated)
            </label>
            <div class="mt-1">
                <input type="text" name="technologies_used" id="technologies_used"
                       value="{{ old('technologies_used', $project ? implode(',', $project->technologies_used) : '') }}"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            @error('technologies_used')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Project URL -->
        <div class="sm:col-span-6">
            <label for="project_url" class="block text-sm font-medium text-gray-700">Project URL</label>
            <div class="mt-1">
                <input type="url" name="project_url" id="project_url"
                       value="{{ old('project_url', $project?->project_url) }}"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            @error('project_url')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Dates -->
        <div class="sm:col-span-3">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <div class="mt-1">
                <input type="date" name="start_date" id="start_date"
                       value="{{ old('start_date', $project?->start_date?->format('Y-m-d')) }}"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            @error('start_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <div class="mt-1">
                <input type="date" name="end_date" id="end_date"
                       value="{{ old('end_date', $project?->end_date?->format('Y-m-d')) }}"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            @error('end_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Featured Image -->
        <div class="sm:col-span-6">
            <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
            <div class="mt-1">
                <input type="file" name="featured_image" id="featured_image"
                       accept="image/*"
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
            </div>
            @if($project?->featured_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $project->featured_image) }}" 
                         alt="Current featured image"
                         class="h-32 w-32 object-cover rounded">
                </div>
            @endif
            @error('featured_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Additional Images -->
        <div class="sm:col-span-6">
            <label for="images" class="block text-sm font-medium text-gray-700">Additional Images</label>
            <div class="mt-1">
                <input type="file" name="images[]" id="images"
                       accept="image/*"
                       multiple
                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300">
            </div>
            @if($project?->images)
                <div class="mt-2 grid grid-cols-3 gap-4">
                    @foreach($project->images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image) }}" 
                                 alt="Project image"
                                 class="h-32 w-full object-cover rounded">
                            <button type="button"
                                    onclick="deleteImage('{{ $image }}', {{ $project->id }})"
                                    class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
            @error('images')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="pt-5">
        <div class="flex justify-end">
            <a href="{{ route('admin.projects.index') }}"
               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </a>
            <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $project ? 'Update Project' : 'Create Project' }}
            </button>
        </div>
    </div>
</form>

@push('scripts')
<script>
function deleteImage(image, projectId) {
    if (confirm('Are you sure you want to delete this image?')) {
        fetch('{{ route('admin.projects.delete-image') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                project_id: projectId,
                image: image
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the image element from the DOM
                const imageElement = event.target.closest('.relative');
                imageElement.remove();
            }
        });
    }
}
</script>
@endpush 