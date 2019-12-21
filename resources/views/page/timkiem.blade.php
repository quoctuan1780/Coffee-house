@extends('master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Tìm kiếm</h4>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="pull-right beta-components space-left ov">
                            <div class="space10">&nbsp;</div>
                            <div class="beta-comp">
                            <form role="search" method="get" id="searchform" action="{{ route('tim-kiem') }}">
                                <input type="text" value="" name="s" id="sAjax" placeholder="Nhập từ khóa..." />
                                <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                                </form>
                            </div>
                        </div>
                        <div id="timkiemchange">
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                            @foreach($product as $spmoi)
                                <div class="col-sm-3" style="height: 400px;">
                                    <div class="single-item">
                                    @if($spmoi->giakm != 0)
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>
                                    @endif

                                        <div class="single-item-header">
                                            <a href="{{route('chi-tiet-san-pham', $spmoi->masp)}}"><img style="box-shadow: 0px 0px 3px 0px rgba(88, 88, 88, 0.3);" src="image/product/{{$spmoi->hinhanh}}" alt="" height="250px"></a>
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
                                            <a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $spmoi->masp)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
@endsection

@section('script')
    <script>
        // $(document).ready(function(){
        //     $("#sAjax").change(function(){
        //         var str = $(this).val();
        //         $.get("/Coffee/public/timkiemAjax/"+str, function(data){
        //             // alert(data);
        //             $("#timkiemchange").html(data);
        //         });
        //     }); 
        // });
        $(document).ready(function(){
      
            $('#sAjax').keyup(function(){ 
            var query = $(this).val(); 
            if(query != '') 
                {
                var _token = $('input[name="_token"]').val(); 
                    $.ajax({
                        url:"{{ route('timkiemAjax') }}", 
                        method:"GET", 
                        data:{query:query, _token:_token},
                        success:function(data){ 
                            $('#timkiemchange').fadeIn();  
                            $('#timkiemchange').html(data); 
                        }
                    });
                }
            }); 
        });
    </script>
@endsection