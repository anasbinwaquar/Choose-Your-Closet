<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart 
{
	public $items=null;
    public $items_size=null;
	public $totalQty=0;
	public $totalPrice=0;

	public function __construct($oldCart){
		if($oldCart){
			//$this->items_size=$oldCart->items_size;
			$this->items=$oldCart->items;
			$this->totalPrice=$oldCart->totalPrice;
			$this->totalQty=$oldCart->totalQty;
		}
	}
	public function add($item,$id,$quantity,$size){
		$storedItem=['qty'=>$quantity,'siz'=>$size,'price'=>$item->price_per_unit,'item'=>$item];
		// if($this->items){
		// 		if(array_key_exists($id,$this->items))
		// 		{
		// 		$storedItem['qty']++;
		// 		}
		// 	}
			//$storedItem['qty']++;
			$storedItem['price']=$item->price_per_unit * $storedItem['qty'];
			$this->items[$id][$size]= $storedItem; 
			//$this->items_size[$size]= $storedItem; 
			$this->totalQty	+=	$quantity;
			$this->totalPrice += $storedItem['price'];
	}
	public function update_cart($id,$quantity,$size,$item,$discount){
		$discount=($discount/100)*$item->price_per_unit;
		$item->price_per_unit=$item->price_per_unit-$discount;
		$previous_quantity=$this->items[$id][$size]['qty'];
		$previous_price=$this->items[$id][$size]['price'];
		$storedItem=['qty'=>$quantity,'siz'=>$size,'price'=>$item->price_per_unit,'item'=>$item];
		// if($this->items){
		// 		if(array_key_exists($id,$this->items))
		// 		{
		// 		$storedItem['qty']++;
		// 		}
		// 	}
			//$storedItem['qty']++;
			$storedItem['price']=$item->price_per_unit * $storedItem['qty'];
			$this->items[$id][$size]= $storedItem;
			if($previous_quantity <= $quantity) 
			{
				$quantity=$quantity-$previous_quantity;
				$this->totalQty	+=	$quantity;
			}
			else if($previous_quantity > $quantity) 
			{
				$previous_quantity=$previous_quantity-$quantity;
				$this->totalQty	-=	$previous_quantity;
			}
			if($previous_price <= $storedItem['price']) 
			{
				$storedItem['price']=$storedItem['price']-$previous_price;
				$this->totalPrice += $storedItem['price'];
			}
			else if($previous_price > $storedItem['price']) 
			{
				$previous_price=$previous_price-$storedItem['price'];
				$this->totalPrice -= $previous_price;
			}
	}

		public function delete_cart($id,$size,$item)
	{
		$previous_quantity = $this->items[$id][$size]['qty'];
		$previous_price = $item->price_per_unit * $previous_quantity;
		$storedItem=['qty'=>$previous_quantity,'siz'=>$size,'price'=>$item->price_per_unit,'item'=>$item];
		// if($this->items){
		// 		if(array_key_exists($id,$this->items))
		// 		{
		// 		$storedItem['qty']++;
		// 		}
		// 	}
			//$storedItem['qty']++;
		if(empty($this->items))
		{
			$this->totalQty	=0;
			$this->totalPrice =0;
		}
		else
		{
			unset($this->items[$id]);
			$this->totalQty	-=	$previous_quantity;
			$this->totalPrice -= $previous_price;
			//dd($this->totalPrice);
		}
			//dd($this->totalPrice);
	}

	// public function add($item,$id){
	// 	$storedItem=['qty'=>0,'price'=>$item->price_per_unit,'item'=>$item];
	// 	if($this->items){
	// 		if(array_key_exists($id,$this->items)){
	// 			$storedItem=$this->items[$id];
	// 		}
	// 	}
	// 		$storedItem['qty']++;
	// 		$storedItem['price']=$item->price_per_unit* $storedItem['qty'];
	// 		$this->items[$id]= $storedItem; 
	// 		$this->totalQty++;
	// 		$this->totalPrice += $item->price_per_unit;
	// }

}
