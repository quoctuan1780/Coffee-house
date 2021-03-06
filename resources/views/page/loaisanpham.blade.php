	@extends('master')
	@section('content')
	<div class="inner-header">
			<div class="container">
				<div class="pull-left">
					<h6 class="inner-title">Sản phẩm {{$tenloaisp->tenloaisp}}</h6>
				</div>
				<div class="pull-right">
					<div class="beta-breadcrumb font-large">
						<a href="{{route('trang-chu')}}">Home</a> / <span>Sản phẩm</span>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
	</div>
	<div class="container">
			<div id="content" class="space-top-none">
				<div class="main-content">
					<div class="space60">&nbsp;</div>
					<div class="row">
						<div class="col-sm-3">
							<ul class="aside-menu">
								@foreach($loaisp as $loai)
								<li><a href="{{route('loai-san-pham', $loai->maloaisp)}}">{{$loai->tenloaisp}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="col-sm-9">
							<div class="beta-products-list">
								<h4>Sản phẩm</h4>
								<div class="beta-products-details">
									<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
									<div class="clearfix"></div>
								</div>

								<div class="row">
								@foreach($sp_theoloai as $sp)
									<div class="col-sm-4" style="height: 400px">
										<div class="single-item">
										@if($sp->giakm != 0)
											<div class="ribbon-wrapper">
												<div class="ribbon sale">Sale</div>
											</div>
										@endif
											<div class="single-item-header">
												<a href="{{route('chi-tiet-san-pham', $sp->masp)}}"><img style="height:250px" src="image/product/{{$sp->hinhanh}}" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$sp->tensp}}</p>
												<p class="single-item-price">
												@if($sp->giakm == 0)
													<span class="flash-sale">{{number_format($sp->gia)}} VND</span>
												@else
													<span class="flash-del">{{number_format($sp->gia)}} VND</span>
													<span class="flash-sale">{{number_format($sp->giakm)}} VND</span>
												@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="javascript:void(0)" onclick="addCart({{ $sp->masp }})"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $sp->masp)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
								</div>
							</div> <!-- .beta-products-list -->

							<div class="space50">&nbsp;</div>

							<div class="beta-products-list">
								<h4>Sản phẩm khác</h4>
								<div class="beta-products-details">
									<p class="pull-left">Tìm thấy {{$sp_khac->total()}} sản phẩm</p>
									<div class="clearfix"></div>
								</div>
								<div class="row">
								@foreach($sp_khac as $sp_k)
									<div class="col-sm-4" style="height: 400px">
										<div class="single-item">
										@if($sp_k->giakm != 0)
											<div class="ribbon-wrapper">
												<div class="ribbon sale">Sale</div>
											</div>
										@endif
											<div class="single-item-header">
												<a href="{{route('chi-tiet-san-pham', $sp_k->masp)}}"><img style="height:250px" src="image/product/{{$sp_k->hinhanh}}" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$sp_k->tensp}}</p>
												<p class="single-item-price">
												@if($sp_k->giakm == 0)
													<span class="flash-sale">{{number_format($sp_k->gia)}} VND</span>
												@else
													<span class="flash-del">{{number_format($sp_k->gia)}} VND</span>
													<span class="flash-sale">{{number_format($sp_k->giakm)}} VND</span>
												@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="javascript:void(0)" onclick="addCart({{ $sp_k->masp }})"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chi-tiet-san-pham', $sp_k->masp)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
								</div>
								<div class="row">{{$sp_khac->links()}}</div>
								<div class="space40">&nbsp;</div>
								
							</div> <!-- .beta-products-list -->
						</div>
					</div> <!-- end section with sidebar and main content -->


				</div> <!-- .main-content -->
			</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection