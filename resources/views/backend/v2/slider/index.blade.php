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
                            <div class="card-header">Slider
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="add-modal btn btn-primary">
                                            <a href="{{route('sliders.create')}}"><span style="color: white"><i class="fa fa-plus-circle"></i>Thêm Slider</span></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped b-t b-light">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Chú Thích</th>
                                        <th>Trạng Thái</th>
                                        <th style="width:120px; text-align: center">Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider as $sliders)
                                        <tr>
                                            <td>{{$sliders->name}}</td>
                                            <td><img src="../{{$sliders->avatar}}" alt="Ảnh Danh Mục" style="width: 200px;"></td>
                                            <td><span class="text-ellipsis">{!! $sliders->description !!}</span></td>
                                            @if($sliders->status ==0)
                                                <td><span class="text-ellipsis"><?php echo 'Ẩn' ?></span></td>
                                            @else
                                                <td><span class="text-ellipsis"><?php echo 'Hiển Thị' ?></span></td>
                                            @endif
                                            <td style="text-align: center">
                                                <a href="{{route('sliders.detail',$sliders->id)}}"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('sliders.edit',[$sliders->id])}}"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('sliders.delete',$sliders->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Slider này ?')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {{ $slider->links() }}
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
