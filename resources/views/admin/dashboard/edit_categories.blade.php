@extends('admin.layouts.master')

@section('content')
    <h2>Edit Category</h2>

    <form action="{{ route('update', $category->id) }}" method="POST">
        @csrf
        <!-- @method('PUT') -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" required>
        </div>
        <div class="form-group">
            <label for="show_at_nav">Show At Nav:</label>
            <select name="show_at_nav" class="form-control">
                <option value="1" {{ $category->show_at_nav ? 'selected' : '' }}>Có</option>
                <option value="0" {{ !$category->show_at_nav ? 'selected' : '' }}>Không</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
    </form>
@endsection
