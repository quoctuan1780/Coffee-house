@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giới thiệu</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Giới thiệu</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">Lịch sử của chúng tôi</h2>
				<div class="space35">&nbsp;</div>

				<div class="history-slider">
					<div class="history-navigation">
						@foreach($gioithieu as $gt)
						<a data-slide-index="{{ $gt->magt - 1 }}" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">{{ $gt->nam }}</span></a>
						@endforeach
					</div>

					<div class="history-slides">
						@foreach($gioithieu as $gt)
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="image/NewsImage/{{ $gt->hinhanh }}" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">{{ $gt->tieude }}</h5>
								<div class="space20">&nbsp;</div>
								<p>{{ $gt->noidung }}</p>
							</div>
							</div> 
						</div>
						@endforeach
					</div>
				</div>
			</div>

				{{-- <div class="space50">&nbsp;</div>
				<hr />
				<div class="space50">&nbsp;</div>
				<h2 class="text-center wow fadeInDown">Our Passion for What We Do Transfers Into Our Services</h2>
				<div class="space20">&nbsp;</div>
				<p class="text-center wow fadeInLeft">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br /> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
				<div class="space35">&nbsp;</div>

				<div class="row">
					<div class="col-sm-2 col-sm-push-2">
						<div class="beta-counter">
							<p class="beta-counter-icon"><i class="fa fa-user"></i></p>
							<p class="beta-counter-value timer numbers" data-to="19855" data-speed="2000">19855</p>
							<p class="beta-counter-title">Clients Satisfied</p>
						</div>
					</div>

					<div class="col-sm-2 col-sm-push-2">
						<div class="beta-counter">
							<p class="beta-counter-icon"><i class="fa fa-picture-o"></i></p>
							<p class="beta-counter-value timer numbers" data-to="3568" data-speed="2000">3568</p>
							<p class="beta-counter-title">Amazing Works</p>
						</div>
					</div>

					<div class="col-sm-2 col-sm-push-2">
						<div class="beta-counter">
							<p class="beta-counter-icon"><i class="fa fa-clock-o"></i></p>
							<p class="beta-counter-value timer numbers" data-to="258934" data-speed="2000">258934</p>
							<p class="beta-counter-title">Support Hours</p>
						</div>
					</div>

					<div class="col-sm-2 col-sm-push-2">
						<div class="beta-counter">
							<p class="beta-counter-icon"><i class="fa fa-pencil"></i></p>
							<p class="beta-counter-value timer numbers" data-to="150" data-speed="2000">150</p>
							<p class="beta-counter-title">New Projects</p>
						</div>
					</div>
				</div> --}} <!-- .beta-counter block end -->

			<div class="space50">&nbsp;</div>
			<hr />
			<div class="space50">&nbsp;</div>

			<h2 class="text-center wow fadeInDownwow fadeInDown">Người sáng lập</h2>
			<div class="space20">&nbsp;</div>
			{{-- <h5 class="text-center other-title wow fadeInLeft">Founders</h5>
			<p class="text-center wow fadeInRight">Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia <br />consequuntur magni dolores.</p> --}}
			<div class="space20">&nbsp;</div>
			<div class="row">
				<div class="col-sm-6 wow fadeInLeft">
					<div class="beta-person media">
					
						<img class="pull-left" src="http://file.hstatic.net/1000075078/file/anhninh2.jpg" style="background-size: cover; width: 285px; height: 380px" alt="">
					
						<div class="media-body beta-person-body">
							<h5>NGUYỄN HẢI NINH</h5>
							<p class="font-large">FOUNDER & CEO</p><br>
							<p>Người nông dân trồng cà phê mơ ước được no đủ hơn. Chuyên gia kỹ thuật mơ ước mỗi mùa cà phê chất lượng sẽ cao hơn. Nghệ nhân rang và pha chế mơ ước đem đến những tách cà phê hoàn hảo nhất. Và tất cả chúng tôi cùng ước mơ đem được hạt cà phê chất lượng cao của Việt Nam ra thế giới. Đó là lý do để tôi bắt đầu câu chuyện Coffee House, và bây giờ là câu chuyện Từ nông trại đến tách cà phê. Ít ai biết rằng, ngay từ những cửa hàng đầu tiên, chúng tôi đã bắt đầu ươm mầm và chăm dưỡng những cây cà phê ở trang trại Cầu Đất.</p>	
						</div>
					</div>
				</div>
				<div class="col-sm-6 wow fadeInRight">
					<div class="beta-person media ">
					
						<img class="pull-left" src="http://file.hstatic.net/1000075078/file/anhhoa2.jpg" style="background-size: cover; width: 285px; height: 380px" alt="">
					
						<div class="media-body beta-person-body">
							<h5>NGUYỄN VĂN HOÀ</h5>
							<p class="font-large">CHUYÊN GIA CÀ PHÊ NHÂN</p><br>
							<p>Cà phê. Người ta thường uống để tỉnh táo, tôi lại uống để mộng mơ.
								Làm một công việc đều đặn mỗi ngày, người ta dễ thấy nhàm chán. Tôi lại thấy may mắn kỳ lạ.
								Việc này, mỗi ngày, làm hàng ngàn lần, đều như mới.
								Cười như mới, say như mới. Mùi đất như mới.
								Tuổi trẻ thèm phồn hoa nhộn nhịp, tôi lại say mê đồi cà phê 1,650m trên cao, quanh năm sương mù bao phủ.
								Người ta dùng sức vóc để giành giật bon chen, tôi muốn dùng đôi bàn tay này để lựa chọn. Hương vị của một dải sơn nguyên, đắng, ngọt, chua, mồ hôi, tiếng cười, máu, thời gian, tâm sức.</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="space60">&nbsp;</div>
			<h5 class="text-center other-title wow fadeInDown">NHỮNG NGƯỜI TẠO NÊN SỰ ĐẶC BIỆT</h5>
			{{-- <p class="text-center wow fadeInUp">Nemo enims voluptatem quia volupas sit aspe aut odit aut fugit, sed quia <br />consequuntur magni dolores.</p> --}}
			<div class="space20">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
				<div class="bets-img-hover">
						<img src="http://file.hstatic.net/1000075078/file/ba_leduy.jpg"  style="background-size: cover; width: 270px; height: 285px"  alt="">
				</div>
						<div class="beta-person-body">
							<h5>LÊ DUY</h5>
							<p class="font-large">BARISTA</p><br>
							<p>Ngày đầu tiên tại The Coffee House</p>
							<b>Bạn có nhớ ngày đầu tiên đi làm ở The Coffee House không?</b>
							<b>Vậy từ đó trở đi có bị đổ lần nào nữa không?</b>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="http://file.hstatic.net/1000075078/file/coffee_house_supreme_-0245.jpg" style="background-size: cover; width: 270px; height: 285px" alt="">
					</div>
						<div class="beta-person-body">
							<h5>TRẦN LÊ MINH TRÚC</h5>
							<p class="font-large">NGHỆ NHÂN RANG</p><br>
							<p>Trái tim hồn nhiên với nghề</p>
							<b>Ly cà phê hoàn hảo nhất phải đến từ trái tim hồn nhiên với nghề và lòng bao dung cho chính bản thân mình.</b>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
					<div class="bets-img-hover">
						<img src="http://file.hstatic.net/1000075078/file/thanh.jpg" style="background-size: cover; width: 270px; height: 285px" alt="">
					</div>
						<div class="beta-person-body">
							<h5>THANH</h5>
							<p class="font-large">"NGƯỜI NHÀ"</p><br>
							<p>Vì người nhà chẳng muốn xa nhau</p>
							<b>Chắc em sẽ làm lâu luôn đó, vì người nhà chẳng muốn xa nhau nữa rồi.</b>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="beta-person beta-person-full">
					<div class="bets-img-hover">	
						<img src="http://file.hstatic.net/1000075078/file/sup_niemvq2.jpg" style="background-size: cover; width: 270px; height: 285px" alt="">
					</div>
						<div class="beta-person-body">
							<h5>NÌM VÙN QUYÊN</h5>
							<p class="font-large">GIÁM SÁT CỬA HÀNG</p><br>
							<b>Phiên bản tốt hơn của chính mình ngày hôm qua</b>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- #content -->
</div> <!-- .container -->
@endsection