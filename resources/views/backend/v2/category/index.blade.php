@include('backend.v2.header')
<?php $shop = ShopifyApp::shop(); ?>
@include('backend.v2.preloader')

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('backend.v2.layouts.app-header')
    <div class="app-main">
        @include('backend.v2.layouts.app-sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="fa fa-bell icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div class="main-card card">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!--end app-page-title-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">Danh Mục Sản Phẩm
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="add-modal btn btn-primary">
                                            <a href="{{route('category.create')}}"><span style="color: white"><i class="fa fa-plus-circle"></i>Thêm Danh Mục</span></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped b-t b-light">
                                    <thead>
                                    <tr>
                                        <th>Tên Danh Mục</th>
                                        <th>Ảnh Danh Mục</th>
                                        <th>Chú Thích</th>
                                        <th>Trạng Thái</th>
                                        <th style="width:120px; text-align: center">Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $categories)
                                        <tr>
                                            <td>{{$categories->name}}</td>
                                            <td><img src="{{$categories->avatar}}" alt="Ảnh Danh Mục" style="width: 100px; height: 100px"></td>
                                            <td><span class="text-ellipsis">{!! $categories->description !!}</span></td>
                                            @if($categories->status ==0)
                                                <td><span class="text-ellipsis"><?php echo 'Ẩn' ?></span></td>
                                            @else
                                                <td><span class="text-ellipsis"><?php echo 'Hiển Thị' ?></span></td>
                                            @endif
                                            <td style="text-align: center">
                                                <a href="{{route('category.detail',$categories->id)}}"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('category.edit',[$categories->id])}}"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('category.delete',$categories->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Danh Mục này ?')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {{ $category->links() }}
                            </div>
                        </div>

                    </div>

                </div>
                @include('backend.v2.other-apps')
            </div>
            @include('backend.v2.layouts.footer-wrapper')
        </div>
    </div>
</div>
@include('backend.v2.footer')
