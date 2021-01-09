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
                <b>Chi Tiết Sản Phẩm</b>
            </header>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    @foreach($product as $product)
                        <tr>
                            <th scope="col">ID</th>
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tên Sản Phẩm</th>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Tên Danh Mục</th>
                            <td> @foreach($cate_category as $cc)
                                    @if($cc->id == $product->categoryId)
                                        <span class="text-ellipsis">
                                        <?php echo $cc->name?>
                                    </span>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Mô Tả Ngắn</th>
                            <td>{{$product->title}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Mô Tả Chi Tiết</th>
                            <td>{!! $product->description !!}</td>
                        </tr>
                        <tr>
                            <th scope="col">Ảnh Sản Phẩm</th>
                            <td><img src="../../{{$product->avatar}}" alt="" style="height: 100px; width: 100px"></td>
                        </tr>
                        <tr>
                            <th scope="col">Giá Mới</th>
                            <td>{{$product->price}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Giá Cũ</th>
                            <td>{{$product->old_price}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Giảm Giá</th>
                            <td>{{$product->discount}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Số Lượng</th>
                            <td>{{$product->amount}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Trạng Thái</th>
                            <td>
                                @if($product->status ==0)
                                    <span class="text-ellipsis"><?php echo 'Ẩn' ?></span>
                                @else
                                    <span class="text-ellipsis"><?php echo 'Hiển Thị' ?></span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Ngày Tạo</th>
                            <td>{{$product->created_at}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Ngày Sửa</th>
                            <td>{{$product->updated_at}}</td>
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