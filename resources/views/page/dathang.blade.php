@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		@if(Auth::check() == false)
			<div class="row">
				<div class="col-sm-6">
					<h6>Đăng nhập để mua hàng hoặc là điền thông tin mua hàng vào form bên dưới</h6>
					<div class="form-block">
						<a href="{{route('dang-nhap')}}" style="font-size: 12pt; color: #0099FF">Đăng nhập ngay</a></div>
				</div>
			</div>
		
			<form action="{{route('dat-hang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				@if(Session::has('thongbao'))
				<div class="alert alert-success">{{Session::get('thongbao')}}</div>
				@endif
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h4>Thông tin đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label style="padding-top: 10px">Email*</label>
						<input type="email" id="emailAjax" name="emailAjax" required placeholder="expample@gmail.com">
					</div>

				<div id="datachange">
					<div class="form-block">
					<label for="name">Họ tên*</label>
					<input type="text" id="nameAjax" name="hotenAjax" placeholder="Họ tên" required>
					</div>

					<div class="form-block">
						<label>Giới tính </label>
						<input id="genderAjax" type="radio" class="input-radio" name="gioitinhAjax" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="genderAjax" type="radio" class="input-radio" name="gioitinhAjax" value="Nữ" style="width: 10%"><span>Nữ</span>			
					</div>

					<div class="form-block">
						<label for="adress" style="padding-top: 10px">Địa chỉ*</label>
						<input type="text" id="addressAjax" name="diachiAjax" placeholder="Street Address" required>
					</div>
					
					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phoneAjax" name="sodtAjax" required>
					</div>
				</div>

				<div class="form-block">
					<label for="notes">Ghi chú</label>
					<textarea id="notesAjax" name="ghichuAjax"></textarea>
				</div>

				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="image/product/{{$cart['item']['hinhanh']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large" style="font-weight: bold;">{{$cart['item']['tensp']}}</p>
											<span class="color-gray your-order-info" style="font-weight: bold;">Đơn giá: {{number_format($cart['price'])}} đồng</span>
											<span class="color-gray your-order-info" style="font-weight: bold;">Số lượng: {{$cart['qty']}}</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								@endif
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif VND</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
			</form>
		@else
			<form action="{{route('dat-hang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
			<div class="row">
				<div class="col-sm-6">
					<h4>Thông tin đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
					<label style="padding-top: 10px">Email*</label>
					<input type="email" id="email" name="email" value="{{$khachhang->email}}" required placeholder="expample@gmail.com">
					</div>

					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" name="hoten" value="{{$khachhang->hoten}}" placeholder="Họ tên" required>
					</div>
					<div class="form-block">
					@if($khachhang->gioitinh == 'Nam')
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gioitinh" value="Nam" checked="checked" style="width: 10%">
						<span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gioitinh" value="Nữ" style="width: 10%">
						<span>Nữ</span>
					@else
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gioitinh" value="Nam" style="width: 10%">
						<span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gioitinh" value="Nữ" checked="checked" style="width: 10%">
						<span>Nữ</span>
					@endif
					</div>

					<div class="form-block">
						<label for="adress" style="padding-top: 10px">Địa chỉ*</label>
						<input type="text" id="address" name="diachi" value="{{$khachhang->diachi}}" placeholder="Street Address" required>
					</div>
					

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="sodt" value="{{$khachhang->sodt}}" required>
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="ghichu"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="image/product/{{$cart['item']['hinhanh']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large" style="font-weight: bold;">{{$cart['item']['tensp']}}</p>
											<span class="color-gray your-order-info" style="font-weight: bold;">Đơn giá: {{number_format($cart['price'])}} đồng</span>
											<span class="color-gray your-order-info" style="font-weight: bold;">Số lượng: {{$cart['qty']}}</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								@endif
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif VND</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>
								
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
		@endif
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection

@section('script')
	<script>
   		$(document).ready(function(){
   			$("#emailAjax").change(function(){
   				var email = $(this).val();
   				$.get("/Coffee/public/donhang/"+email, function(data){
   					if(data) $("#datachange").html(data);
   				});
   			});	
   		});
    </script>
@endsection