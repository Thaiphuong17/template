@extends('admin.layouts.master')

@section('content')
<section class="section">
    <!-- <div class="section-header">
            <h1>{{ __('admin.Dashboard') }}</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total News</h4>
                        </div>
                        <div class="card-body">
                            30
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            4
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Roles</h4>
                        </div>
                        <div class="card-body">
                            3
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Permissions</h4>
                        </div>
                        <div class="card-body">
                            10
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


    <div class="section-header">
        <h1>Categories</h1>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
    <div class="card card-dark">
        <div class="card-header">
            <h4>All Categories</h4>
            <div class="card-header-action">
                <a href="{{route('store')}}" class='btn btn-dark'>
                    <i class="fas fa-plus"></i>Create new category
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content tab-bordered" id="myTab3Content">

                <div class="tab-pane fade show active" id="home-categories" role="tabpanel"
                    aria-labelledby="home-categories">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-categories">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            ID
                                        </th>
                                        <th>Danh mục</th>
                                        <th>Hiện trong menu</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                @if ($category->show_at_nav == 1)
                                                    <span class='badge badge-primary'>Có</span>
                                                @else
                                                    <span class='badge badge-warning'>Không</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($category->status == 1)
                                                    <span class='badge badge-success'>Đang hoạt động</span>
                                                @else
                                                    <span class='badge badge-warning'>Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="display:flex;align-items:center;">
                                                <a href="{{route('edit',$category->id)}}" style="height: 36px;margin-right:2px;" 
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('destroy', $category->id)}}" style="margin-left: 2px;" type="submit" class="btn btn-danger"><i
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

                    </div>
                </div>
            </div>
        </div>
</section>
@endsection