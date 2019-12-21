	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{ route('lien-he') }}"><i class="fa fa-home"></i>Quốc Tuấn - Đại học công nghệ thông tin - KP6 - Linh Trung - Thủ Đức - TP HCM</a></li>
						<li><a href="{{ route('lien-he') }}"><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						<li><a href="{{ route('thong-tin-tai-khoan', Auth::User()->id) }}"><i class="fa fa-user" style="font-size: 12pt"> {{Auth::user()->tentk}}</i></a></li>
						<li><a href="{{route('dang-xuat')}}">Đăng xuất</a></li>
					@else
						<li><a href="{{ route('dang-ki') }}">Đăng kí</a></li>
						<li><a href="{{ route('dang-nhap') }}">Đăng nhập</a></li>
					@endif
					</ul>
				</div>

				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{ route('trang-chu') }}" id="logo"><img src="image/logo/logo-coffee-house.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{ route('tim-kiem') }}">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>
					<div class="beta-comp">
					@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">							
							@foreach($product_cart as $product)
								<div class="cart-item">
								<a class="cart-item-delete" href="{{ route('xoa-gio-hang', $product['item']['masp']) }}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="{{ route('chi-tiet-san-pham', $product['item']['masp']) }}"><img src="image/product/{{$product['item']['hinhanh']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['tensp']}}</span>
											{{-- <span class="cart-item-options">Size: XS; Colar: Navy</span> --}}
											<span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['giakm'] == 0){{number_format($product['item']['gia'])}} @else {{number_format($product['item']['giakm'])}}@endif VND</span></span>
										</div>
									</div>
								</div>
							@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}}VND</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{ route('dat-hang') }}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: black;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a href="javascrip:void(0)">Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
									<li><a href="{{ route('loai-san-pham', $loai->maloaisp) }}">{{$loai->tenloaisp}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{ route('gioi-thieu') }}">Giới thiệu</a></li>
						<li><a href="{{ route('lien-he') }}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->