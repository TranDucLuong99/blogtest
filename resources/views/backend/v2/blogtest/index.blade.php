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
                            <div class="card-header">Danh Sách Tin Tức
                                <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="add-modal btn btn-primary">
                                            <a href="{{route('blogtest.create')}}"><span style="color: white"><i class="fa fa-plus-circle"></i>Thêm Tin Tức</span></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-agile-info">
                                <div class="panel panel-default">
                                    <!--        --><?php //$message = Session::get('message');
                                    //        if($message)
                                    //            echo $message;
                                    //        Session::put('message', null);
                                    //        ?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped b-t b-light">
                                        <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Loại Tin Tức</th>
                                            <th>Ảnh Tin</th>
                                            <th>Mô Tả Ngắn</th>
                                            <th>Trạng Thái</th>
                                            <th style="width:120px; text-align: center">Hành Động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($blogtest as $blogtests)
                                            <tr>
                                                <td>{{$blogtests->name}}</td>
                                                <td>
                                                    @foreach($cate_category as $cc)
                                                        @if($cc->id == $blogtests->categoryId)
                                                            <span class="text-ellipsis">
                                                    <?php echo $cc->name?>
                                                </span>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td><img src="../{{$blogtests->avatar}}" alt="Ảnh Danh Mục" style="width: 150px"></td>
                                                <td>{{$blogtests->title}}</td>
                                                @if($blogtests->status ==0)
                                                    <td><span class="text-ellipsis"><?php echo 'Ẩn' ?></span></td>
                                                @else
                                                    <td><span class="text-ellipsis"><?php echo 'Hiển Thị' ?></span></td>
                                                @endif
                                                <td style="text-align: center">
                                                    <a href="{{route('blogtest.detail',$blogtests->id)}}"><i class="fas fa-eye"></i></a>
                                                    <a href="{{route('blogtest.edit',$blogtests->id)}}"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('blogtest.delete',$blogtests->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Danh Mục này ?')"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">

                                        {{--<div class="col-sm-5 text-center">--}}
                                        {{--<small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>--}}
                                        {{--</div>--}}
                                        <div class="col-sm-7 text-right text-center-xs">
                                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                                {{--<div class="row">--}}
                                                {{--{{$product->links()}}--}}
                                                {{--</div>--}}
                                            </ul>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                        @include('backend.v2.other-apps')
                    </div>
                    @include('backend.v2.layouts.footer-wrapper')
                </div>
            </div>
        </div>
@include('backend.v2.footer')