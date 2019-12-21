@extends('master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row col-lg-12">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin tài khoản</h1>
            </div>
            <div class="widget-body no-padding" style="border: 1px; ">
                <div class="hienthi" style="display: inline-flex;">
                    <div class="padding-10">
                    <br>
                    <div class="pull-left">
                        <div class="row" style="padding-left: 48px;">
                            <div class="row" style="align-content: center; box-shadow: 0px 0px 3px 0px rgba(88, 88, 88, 0.3); padding: 5px 10px; text-shadow: darkgrey">
                                <img src="image/customer/{{ Auth::user()->hinhanh }}" class="img-circle" alt="Cinque Terre" width="200px" height="220px"> 
                                <div style="text-align: center; padding-right: 10px">Ảnh đại diện</div><br>
                                <div>Tên tài khoản: {{ Auth::User()->tentk }}</div><br>
                                <div>Email: {{ Auth::User()->email }}</div><br>
                                <div>Họ tên: {{ $khachhang->hoten }}</div><br>
                                <div>Giới tính: {{ $khachhang->gioitinh }}</div><br>
                                <div>Địa chỉ: {{ $khachhang->diachi }}</div><br>
                                <div>Điện thoại: {{ $khachhang->sodt }}</div><br>
                                <div class="col-lg-12" style="display: inline-flex">
                                    <div class="col-lg-0">
                                            <a href="{{ route('doi-mat-khau') }}" style="color: #4169E1">Đổi mật khẩu</a>
                                    </div>
                                    <div class="col-lg-0" style="padding: 0px 0px 0px 10px">
                                        <a href="{{ route('dang-xuat') }}" style="color: #4169E1">Đăng xuất</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    {{-- <div class="pull-right">
                        <h1 class="font-400">Đơn hàng</h1>
                    </div> --}}
                    <div class="clearfix"></div>
                    <br>
                </div>
                <div style="padding-left: 20px; box-shadow: 0px 0px 3px 0px rgba(88, 88, 88, 0.3); margin: 20px 100px;">
                    <form action="{{ route('cap-nhat-thong-tin') }}" method="POST" class="beta-form-checkout">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" name="makh" value="{{ $khachhang->makh }}" hidden>
                        <div>
                            <h6>Cập nhật thông tin khách hàng</h6>
                            @if(Session('thanhcong'))
                            <div class="alert alert-success">
                                {{ Session('thanhcong') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-block">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $khachhang->email }}" disabled>
                        </div>
                        <div class="form-block">
                            <label for="adress">Họ tên</label>
                            <input type="text" name="hoten" value="{{ $khachhang->hoten }}" required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Địa chỉ</label>
                            <input type="text" name="diachi" value="{{ $khachhang->diachi }}" required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Giới tính</label>
                            <input type="text" name="gioitinh" value="{{ $khachhang->gioitinh }}" required>
                        </div>

                        <div class="form-block">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="sodt" value="{{ $khachhang->sodt }}" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div style="padding-left: 20px; box-shadow: 0px 0px 3px 0px rgba(88, 88, 88, 0.3); margin: 20px -20px">

                    <form action="{{ route('cap-nhat-thong-tin-tai-khoan') }}" method="POST" class="beta-form-checkout">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                            <h6>Cập nhật tên tài khoản</h6>
                            @if(Session('thanhcongTk'))
                            <div class="alert alert-success">
                                {{ Session('thanhcongTk') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-block">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ Auth::User()->email }}" disabled>
                        </div>
                        <div class="form-block">
                            <label for="email">Tên tài khoản</label>
                            <input type="text" name="tentk" value="{{ Auth::User()->tentk }}">
                        </div>

                        <div class="form-block">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinhanh" value="{{ Auth::User()->hinhanh }}">
                        </div>

                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection