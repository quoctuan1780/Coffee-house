@extends('master')
@section('content')
<br>
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width:50%">Sản phẩm</th>
				<th style="width:10%">Giá</th>
				<th style="width:8%">Số lượng</th>
				<th style="width:22%" class="text-center">Tổng</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		<tbody>
			@if(Session::has('cart'))
				<div hidden>{{ $row = 1 }}</div>
			@foreach($product_cart as $cart=>$value)
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img src="image/product/{{$value['item']['hinhanh']}}" alt="..." class="img-responsive"/></div>
						<div class="col-sm-10">
							<h4 class="nomargin">{{ $value['item']['tensp'] }}</h4>
						</div>
					</div>
				</td>
				@if($value['item']['giakm'] == 0)
					<div hidden>{{ $giaht = $value['item']['gia'] }}</div>
				@else
					<div hidden>{{ $giaht = $value['item']['giakm'] }}</div>
				@endif
				<td data-th="Price">{{ number_format($giaht) }} VNĐ</td>
				<td data-th="Quantity">
					<input type="number" class="form-control text-center" id="{{ $cart }}" onchange="change(document.getElementById({{ $cart }}), {{ $cart }}, {{ $giaht }})" value="{{ number_format($value['qty']) }}">
				</td>
				<td data-th="Subtotal" class="text-center"><input type="text" class="{{ $cart }}" value="{{$giaht * $value['qty']}}" style="width: 100px" disabled> VNĐ</td>
				<td class="actions" data-th="">
					<button class="btn btn-danger btn-sm" id="{{ $row }}" onclick="deleteRow({{ $row }}, {{ $cart }})"><i class="fa fa-trash-o"></i></button>								
				</td>
			</tr>
			<div hidden>{{ $row++ }}</div>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr class="visible-xs">
				<td class="text-center"><strong></strong></td>
			</tr>
			<tr>
				<td><a href="{{ route('trang-chu') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua sắm</a></td>
				<td colspan="2" class="hidden-xs"></td>
				<td class="hidden-xs text-center"><strong>Tổng tiền: @if(Session::has('cart'))<input style="width: 100px" type="text" name="tongtien" id="tongtien" value="{{number_format($totalPrice)}}" disabled> 
					@else 
						<input type="text" name="tongtien" id="tongtien" value="0" style="width: 100px" disabled> 
					@endif VNĐ</strong></td>
				<td><a href="{{ route('dat-hang') }}" class="btn btn-success btn-block">Đặt hàng <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
	</table>
</div>
@endsection
@section('script')
	<script>
		function change(sl, id, gia){
			var soluong = sl.value;
			if(sl.value <= 0) {
			swal({
				  title: "Cảnh báo",
				  text: "Số lượng bạn nhập đang nhỏ hơn hoặc bằng 0",
				  icon: "warning",
				  button: "Tôi đã hiểu!",
				});
			}
			else
			$.ajax({
				url: "{{ route('capnhatAjax') }}",
				method: "GET",
				data:{soluong:soluong, id:id, gia:gia},
				success:function(data){
					document.getElementsByClassName(id)[0].value = gia*soluong;
					document.getElementById('tongtien').value = data;
				}
			});
		}
		function deleteRow(id, masp){
			swal({
			  title: "Thông báo",
			  text: "Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng ?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  	if (willDelete) {
			  		$.ajax({
						url: "{{ route('xoaAjax') }}",
						method: "GET",
						data: {masp:masp},
						success:function(data){
							if(data != 'forget'){
								document.getElementById('cart').deleteRow(id);
								document.getElementById('tongtien').value = parseInt(data);
							}
							else{
								document.getElementById('cart').deleteRow(id);
								document.getElementById('tongtien').value = 0;	
							}
						}
					});
			    	swal("Xóa sản phẩm khỏi giỏ hàng thành công", {
			      icon: "success",
			    	});
			  	} 
			});
		}
	</script>
@endsection