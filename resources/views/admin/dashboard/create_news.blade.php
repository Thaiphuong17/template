@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tạo bài viết mới</h1>
    </div>

    <!--báo lỗi khi tạo không thành công-->
    <!-- <div class="alert alert-danger">
    <ul>
        <li></li>
    </ul>
</div> -->

    <!--Form tạo-->
    <form action="{{route('store_news')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Tiêu Đề</label>
            <input type="text" name="title" class="form-control" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" class="form-control" required>
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
        <label for="name">Tên Loại Tin</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="image">Hình Ảnh</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Nội Dung</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select name="status" class="form-control" required>
                <option value="1">Hiển Thị</option>
                <option value="0">Ẩn</option>
            </select>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="is_breaking_news">Tin Nổi Bật</label>
            <select name="is_breaking_news" class="form-control" required>
                <option value="1">Có</option>
                <option value="0">Không</option>
            </select>
            @error('is_breaking_news')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- <div class="form-group">
            <label for="category_id">Danh Mục</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> -->

        <button type="submit" class="btn btn-primary">Thêm Tin Tức</button>
    </form>
</section>



@endsection