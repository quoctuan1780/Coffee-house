@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->tensp}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-4">
							<img src="image/product/{{$sanpham->hinhanh}}" alt="" height="250px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h3>{{$sanpham->tensp}}</h3></p>
								<p class="single-item-price">
								@if($sanpham->giakm == 0)
                                    <span class="flash-sale">{{number_format($sanpham->gia)}} VND</span>
                                @else
                                    <span class="flash-del">{{number_format($sanpham->gia)}} VND</span>
                                    <span class="flash-sale">{{number_format($sanpham->giakm)}} VND</span>
                                @endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->mota}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								<!-- <select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select> -->
								<form method="get" action="{{ route('them-nhieu-gio-hang', $sanpham->masp) }}">
									<select class="wc-select" name="soluong" style="height: 40px;">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								
									<button type="submit" href="#" style="width: 50px"><a class="add-to-cart" style="margin-left: 2px" href="#"><i class="fa fa-shopping-cart"></i></a></button>
								</form>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->mota}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
						@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
								@if($sptt->giakm != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
									<div class="single-item-header">
										<a href="{{route('chi-tiet-san-pham', $sptt->masp)}}"><img src="image/product/{{$sptt->hinhanh}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->tensp}}</p>
										<p class="single-item-price">
										@if($sptt->giakm == 0)
                                    		<span class="flash-sale">{{number_format($sptt->gia)}} VND</span>
		                                @else
		                                    <span class="flash-del">{{number_format($sptt->gia)}} VND</span>
		                                    <span class="flash-sale">{{number_format($sptt->giakm)}} VND</span>
		                                @endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $sptt->masp)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bán chạy nhất</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($sp_banchay as $spbc)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chi-tiet-san-pham', $spbc->masp)}}"><img src="image/product/{{$spbc->hinhanh}}" alt=""></a>
									<div class="media-body">
										{{$spbc->tensp}}<br>
										@if($spbc->giakm == 0)
											<span class="beta-sales-price">{{number_format($spbc->gia)}} VND</span>
										@else
											<span class="beta-sales-price">{{number_format($spbc->giakm)}} VND</span>
										@endif
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="paginateRow">
									@foreach($sp_moi as $spmoi)
										<span>
											<div class="media beta-sales-item">
											<a class="pull-left" href="{{route('chi-tiet-san-pham', $spmoi->masp)}}"><img src="image/product/{{$spmoi->hinhanh}}" alt=""></a>
											<div class="media-body">
												{{$spmoi->tensp}}<br>
												@if($spmoi->giakm == 0)
													<span class="beta-sales-price">{{number_format($spmoi->gia)}} VND</span>
												@else
													<span class="beta-sales-price">{{number_format($spmoi->giakm)}} VND</span>
												@endif
											</div>
											</div>
										</span><br>
									@endforeach
									<div class="paginate">{{$sp_moi->links()}}</div>
								</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
</div> <!-- .container -->
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
		$('.paginate ul.pagination').hide();

		$(function() {
            $('.paginateRow').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.paginateRow',
                callback: function() {
                    
                    $('.paginate ul.pagination').remove();
                }
            });
        });	
	});	
		
	</script>
@endsection