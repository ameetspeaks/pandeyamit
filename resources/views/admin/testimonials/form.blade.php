@csrf

<div class="row">
    <div class="col-md-8">
        {{-- Client Name --}}
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? '') }}" required>
            @error('client_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Client Position --}}
        <div class="mb-3">
            <label for="client_position" class="form-label">Client Position</label>
            <input type="text" class="form-control @error('client_position') is-invalid @enderror" id="client_position" name="client_position" value="{{ old('client_position', $testimonial->client_position ?? '') }}">
            @error('client_position')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Client Company --}}
        <div class="mb-3">
            <label for="client_company" class="form-label">Client Company</label>
            <input type="text" class="form-control @error('client_company') is-invalid @enderror" id="client_company" name="client_company" value="{{ old('client_company', $testimonial->client_company ?? '') }}">
            @error('client_company')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Testimonial Text --}}
        <div class="mb-3">
            <label for="testimonial_text" class="form-label">Testimonial Text <span class="text-danger">*</span></label>
            <textarea class="form-control @error('testimonial_text') is-invalid @enderror" id="testimonial_text" name="testimonial_text" rows="6" required>{{ old('testimonial_text', $testimonial->testimonial_text ?? '') }}</textarea>
             @error('testimonial_text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
         {{-- Rating --}}
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating">
                <option value="">No Rating</option>
                @for ($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? '') == $i ? 'selected' : '' }}>
                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                    </option>
                @endfor
            </select>
             @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="active" {{ old('status', $testimonial->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $testimonial->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
             @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Client Image --}}
        <div class="mb-3">
            <label for="client_image" class="form-label">Client Image</label>
            <input type="file" class="form-control @error('client_image') is-invalid @enderror" id="client_image" name="client_image" accept="image/*">
             @error('client_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if(isset($testimonial) && $testimonial->client_image)
                <div class="mt-2">
                    <img src="{{ $testimonial->client_image }}" alt="Current Image" class="img-thumbnail" style="max-height: 100px;">
                    <small class="d-block">Current image. Uploading a new one will replace it.</small>
                </div>
            @endif
        </div>

        {{-- Is Featured --}}
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured" {{ old('is_featured', $testimonial->is_featured ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">
                Featured Testimonial
            </label>
        </div>
    </div>
</div>

<hr>

<button type="submit" class="btn btn-primary">{{ isset($testimonial) ? 'Update Testimonial' : 'Create Testimonial' }}</button>
<a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a> 