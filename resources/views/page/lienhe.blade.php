@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Phản hồi ý kiến</h2>
					@if(Session('thanhcong'))
						<div class="alert alert-success">{{ Session('thanhcong') }}</div>
					@endif
					<div class="space20">&nbsp;</div>
					<p>Đây là phần tiếp nhận ý kiến phản hồi của khách hàng, nếu bạn có bất kỳ câu hỏi hay phản hồi nào về vấn đề trong quá tình sử dụng sản phẩm xin hãy điền vào form bên dưới</p>
					<div class="space20">&nbsp;</div>
					<form action="{{ route('lien-he') }}" method="post" class="contact-form">	
					<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-block">
							<input name="name" type="text" placeholder="Họ tên...">
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Email...">
						</div>
						<div class="form-block">
							<input name="subject" type="text" placeholder="Vấn đề...">
						</div>
						<div class="form-block">
							<textarea name="message" placeholder="Thông điệp của bạn"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi phản hồi<i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>Kí túc xá đại học quốc gia khu A - Khu phố 6 - Phường Linh Trung - Quận Thủ Đức - Tp Hồ Chí Minh</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Liên lạc</h6>
					<p>Số điện thoại: 0359554019<br>
						<a href="mailto:CoffeeHouse@gmail.com">CoffeeHouse@gmail.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	
</div> <!-- .container -->
<div class="beta-map">
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3918.2299074780635!2d106.80136461474979!3d10.870110392257974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x317527587e9ad5bf%3A0xafa66f9c8be3c91!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiDEkEhRRyBUUC5IQ00sIGtodSBwaOG7kSA2LCBUaOG7pyDEkOG7qWMsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!3m2!1d10.8701104!2d106.80355329999999!5e0!3m2!1svi!2s!4v1573669558848!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
	</div>
@endsection