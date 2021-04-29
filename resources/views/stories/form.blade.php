<div class="mb-3">
  <label for="title" class="form-label">Title:</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
    value="{{ old('title', $story->title) }}">
  <x-form-error field="title" />
</div>

<div class="mb-3">
  <label for="body" class="form-label">Body:</label>
  <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3"">{{ old('body', $story->body) }}</textarea>
  <x-form-error field="body" />

</div>

<div class="mb-3">
  <label for="type" class="form-label">Type:</label>
  <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
    <option value="">-- Select --</option>
    <option value="short" {{ 'short' == old('type', $story->type) ? 'selected' : '' }}>Short</option>
    <option value="long" {{ 'long' == old('type', $story->type) ? 'selected' : '' }}>Long</option>
  </select>
  <x-form-error field="type" />
</div>

<div class="mb-3">
  <h6 class="form-label">Status:</h6>
  <div class="form-check @error('status') is-invalid @enderror">
    <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status"
      value="1" {{ '1' == old('status', $story->status) ? 'checked' : '' }}>Yes
    </label>
  </div>
  <div class="form-check @error('status') is-invalid @enderror">
    <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status"
      value="0" {{ '0' == old('status', $story->status) ? 'checked' : '' }}>No
    </label>
  </div>
  <x-form-error field="status" />
</div>

<div class="mb-3">
    <label for="image" class="form-label">Image:</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
    <x-form-error field="image" />

  <img class="mt-2" src="{{ $story->thumbnail }}" alt="Story Image">
</div>

<div class="mb-3">
    @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $story->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
            <label class="form-check-label" for="">{{ $tag->name }}</label>
        </div>
    @endforeach
</div>