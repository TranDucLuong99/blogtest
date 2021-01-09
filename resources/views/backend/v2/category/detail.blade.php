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
<div class="row" style="margin-bottom: 32px">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="text-align: center; font-size: 24px">
                <b>Chi Tiết Danh Mục</b>
            </header>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    @foreach($category as $d_category)
                        <tr>
                            <th scope="col">ID</th>
                            <td>{{$d_category->id}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tên Danh Mục</th>
                            <td>{{$d_category->name}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Ảnh Danh Mục</th>
                            <td><img src="../{{$d_category->avatar}}" alt="" style="height: 100px; width: 100px"></td>
                        </tr>
                        <tr>
                            <th scope="col">Chi Tiết</th>
                            <td>{!! $d_category->description !!}</td>
                        </tr>
                        <tr>
                            <th scope="col">Trạng Thái</th>
                            <td>
                                @if($d_category->status ==0)
                                    <span class="text-ellipsis"><?php echo 'Ẩn' ?></span>
                                @else
                                    <span class="text-ellipsis"><?php echo 'Hiển Thị' ?></span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Ngày Tạo</th>
                            <td>{{$d_category->created_at}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Ngày Sửa</th>
                            <td>{{$d_category->updated_at}}</td>
                        </tr>
                    </thead>
                    @endforeach
                </table>
            </div>
        </section>
    </div>
</div>
@include('backend.v2.other-apps')
</div>
@include('backend.v2.layouts.footer-wrapper')
</div>
</div>
</div>
@include('backend.v2.footer')