@extends('admin.layouts.master')

@section('content')
<form action="{{ route('update_news', $news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}"
            required>
    </div>

    <!-- Slug -->
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $news->slug) }}" required>
    </div>

    <!-- Image -->
    <div class="form-group">
        <label for="image">Image</label>
        @if($news->image)
            <img src="{{ asset($news->image) }}" alt="News Image" class="img-fluid" width="200">
        @endif
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <!-- Content -->
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5"
            required>{{ old('content', $news->content) }}</textarea>
    </div>

    <!-- Status -->
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>Published</option>
            <option value="0" {{ $news->status == 0 ? 'selected' : '' }}>Draft</option>
        </select>
    </div>

    <!-- Is Breaking News -->
    <div class="form-group">
        <label for="is_breaking_news">Breaking News</label>
        <select class="form-control" id="is_breaking_news" name="is_breaking_news" required>
            <option value="1" {{ $news->is_breaking_news == 1 ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ $news->is_breaking_news == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <!-- Views (Hidden Field) -->
    <input type="hidden" name="views" value="{{ $news->views }}">

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update News</button>
</form>

@endsection