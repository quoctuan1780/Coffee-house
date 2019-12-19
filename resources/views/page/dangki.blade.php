@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dang-ki')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Tên tài khoản*</label>
							<input type="text" name="tentk" required>
						</div>

						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required>
						</div>

						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" name="re_password" required>
						</div>

						<div class="form-block">
							<label for="adress">Họ tên*</label>
							<input type="text" name="hoten" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="diachi" required>
						</div>

						<div class="form-block">
							<label for="adress">Giới tính*</label>
							<input type="text" name="gioitinh" required>
						</div>

						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" name="sodt" required>
						</div>

						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection