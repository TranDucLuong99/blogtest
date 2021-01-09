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
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading" style="text-align: center; font-size: 24px">
                                <b>Chi Tiết Tin Tức</b>
                            </header>

                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    @foreach($blogtest as $blogtests)
                                        <tr>
                                            <th scope="col">ID</th>
                                            <td>{{$blogtests->id}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tên Sản Phẩm</th>
                                            <td>{{$blogtests->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Tên Danh Mục</th>
                                            <td> @foreach($cate_category as $cc)
                                                    @if($cc->id == $blogtests->categoryId)
                                                        <span class="text-ellipsis">
                                        <?php echo $cc->name?>
                                    </span>
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Mô Tả Ngắn</th>
                                            <td>{{$blogtests->title}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Mô Tả Chi Tiết</th>
                                            <td>{!! $blogtests->description !!}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ảnh Sản Phẩm</th>
                                            <td><img src="../../{{$blogtests->avatar}}" alt="" style="width: 150px"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Trạng Thái</th>
                                            <td>
                                                @if($blogtests->status ==0)
                                                    <span class="text-ellipsis"><?php echo 'Ẩn' ?></span>
                                                @else
                                                    <span class="text-ellipsis"><?php echo 'Hiển Thị' ?></span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ngày Tạo</th>
                                            <td>{{$blogtests->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Ngày Sửa</th>
                                            <td>{{$blogtests->updated_at}}</td>
                                        </tr>
                                    </thead>
                                    @endforeach
                                    <tbody>
                                    </tbody>
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