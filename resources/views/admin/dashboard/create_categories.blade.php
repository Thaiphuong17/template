@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tạo danh mục mới</h1>
    </div>

    <!--báo lỗi khi tạo không thành công-->
    <!-- <div class="alert alert-danger">
    <ul>
        <li></li>
    </ul>
</div> -->

    <!--Form tạo-->
    <form action="{{route('store')}}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>

        <div class="mb-3">
            <label for="show_at_nav" class="form-label">Hiện trong menu</label>
            <select class="form-select" name="show_at_nav" required>
                <option value="1">Hiện</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-select form-select-sm" name="status" aria-label="Small select example">
                <!-- <option selected>Phân loại danh mục</option> -->
                <option value="1" selected>Hoạt động</option>
                <option value="0">Không hoạt động</option>
                
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </form>
</section>



@endsection