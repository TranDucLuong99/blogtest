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
                <header class="panel-heading">
                    <b style="text-align: center">Thêm Danh Mục Sản Phẩm</b>
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{route('category.create')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Tên Danh Mục</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên Danh Mục">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô Tả</label>
                                <textarea  style="resize: none" class="ckeditor form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh Danh Mục</label>
                                <input type="file" id="exampleInputFile" name="avatar">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng Thái</label>
                                <select class="form-control m-bot15" name="status">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">Thêm Danh Mục</button>
                        </form>
                    </div>
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
