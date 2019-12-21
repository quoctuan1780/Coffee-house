@extends('master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner" style="height: 768px;">
                <ul>
                    @foreach($slide as $sl)
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined
                        d" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/slide/img/{{$sl->hinhanh}}" data-src="image/slide/img/{{$sl->hinhanh}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/img/{{$sl->hinhanh}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{$new_product->total()}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                        @foreach($new_product as $spmoi)
                            <div class="col-sm-3" style="height: 400px;">
                                <div class="single-item">
                                @if($spmoi->giakm != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                @endif

                                    <div class="single-item-header">
                                        <a href="#"><img style="box-shadow: 0px 0px 3px 0px rgba(88, 88, 88, 0.3);" src="image/product/{{$spmoi->hinhanh}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spmoi->tensp}}</p>
                                        <p class="single-item-price">
                                        @if($spmoi->giakm == 0)
                                            <span class="flash-sale">{{number_format($spmoi->gia)}} VND</span>
                                        @else
                                            <span class="flash-del">{{number_format($spmoi->gia)}} VND</span>
                                            <span class="flash-sale">{{number_format($spmoi->giakm)}} VND</span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="javascript:void(0)" onclick="addCart({{ $spmoi->masp }})"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="../chitietsanpham/{{$spmoi->masp}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="row">{!!$new_product->appends(['sanpham_khuyenmai' => $sanpham_khuyenmai->currentPage()])->links()!!} </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{$sanpham_khuyenmai->total()}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($sanpham_khuyenmai as $spkm)
                            <div class="col-sm-3" style="height: 400px">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>

                                    <div class="single-item-header">
                                        <a href="{{route('chi-tiet-san-pham', $spkm->masp)}}"><img style="box-shadow: 0px 0px 3px 0px rgba(88, 88, 88, 0.3);" src="image/product/{{$spkm->hinhanh}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spkm->tensp}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{number_format($spkm->gia)}} VND</span>
                                            <span class="flash-sale">{{number_format($spkm->giakm)}} VND</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="javascript:void(0)" onclick="addCart({{ $spkm->masp }})"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('chi-tiet-san-pham', $spkm->masp) }}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">{!! $sanpham_khuyenmai->appends(['new_product' => $new_product->currentPage()])->links()!!}</div>
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
@endsection