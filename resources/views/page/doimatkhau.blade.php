@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đổi mật khẩu</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{ route('trang-chu') }}">Home</a> / <span>Đổi mật khẩu</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
	
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nhập thông tin cần thiết để đổi mật khẩu</h3>
                    </div>
                    <div class="panel-body">
                    @if(Session('loi'))
                        <div class="alert alert-danger">{{Session('loi')}}</div>
                    @endif
                    @if(Session('thanhcong'))
                        <div class="alert alert-success">{{Session('thanhcong')}}</div>
                    @endif
                        <form role="form" action="{{ route('doi-mat-khau') }}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <fieldset>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" value="{{ Auth::user()->email }}" name="email" type="email" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu cũ</label>
                                    <input class="form-control" placeholder="Nhập mật khẩu cũ" name="old_password" type="password" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input class="form-control" placeholder="Nhập mật khẩu mới" name="password" type="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input class="form-control" placeholder="Nhập lại mật khẩu" name="re_password" type="password" required>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Đổi mật khẩu</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection