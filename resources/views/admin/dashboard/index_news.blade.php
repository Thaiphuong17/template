@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Quản lí tin tức</h1>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
    <div class="card card-dark">
        <div class="card-header">
            <h4>Tất cả bài viết</h4>
            <div class="card-header-action">
                <a href="{{route('create_news')}}" class='btn btn-dark'>
                    <i class="fas fa-plus"></i>Thêm bài viết mới
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content tab-bordered" id="myTab3Content">

                <div class="tab-pane fade show active" id="home-categories" role="tabpanel"
                    aria-labelledby="home-categories">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Loại tin</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Tin nóng</th>
                                        <th>Lượt xem</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>
                                                <!-- Hiển thị hình ảnh, nếu có -->
                                                @if($item->image)
                                                    <img src="{{ asset('Frontend/assets/' . $item->image) }}"
                                                        alt="Hình ảnh tin tức" width="100">
                                                @else
                                                    Không có hình ảnh
                                                @endif
                                            </td>
                                            <td>{{ $item->status ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td>{{ $item->is_breaking_news ? 'Có' : 'Không' }}</td>
                                            <td>{{ $item->views }}</td>
                                            <td style="display:flex;align-items:center;">
                                                <a href="{{route('edit_news',$item->id)}}" style="height: 36px;margin-right:2px;" class="btn btn-primary"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{route('destroy_news', $item->id)}}" style="margin-left: 2px;" type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="text-center" style="display: flex;
                justify-content: center;">
                        <!-- Pagination -->
                        {{ $news->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection