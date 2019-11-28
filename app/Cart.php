<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
	//Thêm 1
	public function add($item, $masp){
		if($item->giakm == 0){
			$giohang = ['qty'=> 0, 'price' => $item->gia, 'item' => $item];
		}
		else{
			$giohang = ['qty'=> 0, 'price' => $item->giakm, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($masp, $this->items)){
				$giohang = $this->items[$masp];
			}
		}
		$giohang['qty']++;
		$this->totalQty++;
		$this->items[$masp] = $giohang;
		if($item->giakm == 0){
			$giohang['price'] = $item->gia * $giohang['qty'];
			$this->totalPrice += $item->gia;
		}
		else{
			$giohang['price'] = $item->giakm * $giohang['qty'];
			$this->totalPrice += $item->giakm;
		}
	}

	//Thêm  nhiều
	public function addMulti($item, $masp, $soluong){
		if($item->giakm == 0){
			$giohang = ['qty'=> 0, 'price' => $item->gia, 'item' => $item];
		}
		else{
			$giohang = ['qty'=> 0, 'price' => $item->giakm, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($masp, $this->items)){
				$giohang = $this->items[$masp];
			}
		}
		$giohang['qty'] += $soluong;
		$this->totalQty += $soluong;
		$this->items[$masp] = $giohang;
		if($item->giakm == 0){
			$giohang['price'] = $item->gia * $giohang['qty'];
			$this->totalPrice += $item->gia * $giohang['qty'];
		}
		else{
			$giohang['price'] = $item->giakm * $giohang['qty'];
			$this->totalPrice += $item->giakm * $giohang['qty'];
		}
	}
	//xóa 1
	public function reduceByOne($masp){
		$this->items[$masp]['qty']--;
		$this->items[$masp]['price'] -= $this->items[$masp]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$masp]['item']['price'];
		if($this->items[$masp]['qty']<=0){
			unset($this->items[$masp]);
		}
	}
	//xóa nhiều
	public function removeItem($masp){
		$this->totalQty -= $this->items[$masp]['qty'];
		$this->totalPrice -= $this->items[$masp]['price']*$this->items[$masp]['qty'];
		unset($this->items[$masp]);
	}
}
