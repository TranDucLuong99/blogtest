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
                <b>Cập Nhật Sản Phẩm</b>
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Danh Mục Sản Phẩm</label>
                            <select class="form-control m-bot15" name="categoryId">
                                @foreach($cate_category as $cc)
                                    <option value="{{$cc->id}}">{{$cc->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên Danh Mục" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="title">Mô Tả Ngắn</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Nhập Mô Tả"value="{{$product->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh Sản Phẩm</label>
                            <input type="file" id="exampleInputFile" name="avatar">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá Mới</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Nhập Giá Sản Phẩm"value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="old_price">Giá Cũ</label>
                            <input type="number" class="form-control" id="old_price" name="old_price" placeholder="Nhập Giá Cũ Sản Phẩm"value="{{$product->old_price}}">
                        </div>
                        <div class="form-group">
                            <label for="discount">Giảm giá</label>
                            <input type="number" class="form-control" id="discount" name="discount" placeholder="Nhập Giảm Giá Sản Phẩm"value="{{$product->discount}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô Tả</label>
                            <textarea  style="resize: none" class="ckeditor form-control" name="description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="amount">Số Lượng</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Số lượng"value="{{$product->amount}}">
                        </div>
                        <div class="form-group">
                            <label for="">Trạng Thái</label>
                            <select class="form-control m-bot15" name="status">
                                <option value="1">Hiển Thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-info">Cập Nhật Sản Phẩm</button>
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