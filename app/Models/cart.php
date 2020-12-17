<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart 
{
    public $items=null;
	public $totalQty=0;
	public $totalPrice=0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items=$oldCart->items;
			$this->totalPrice=$oldCart->totalPrice;
			$this->totalQty=$oldCart->totalQty;
		}
	}
	public function add($item,$id){
		$storedItem=['qty'=>0,'price'=>$item->price_per_unit,'item'=>$item];
		if($this->items){
			if(array_key_exists($id,$this->items)){
				$storedItem=$this->items[$id];
				$this->totalQty++;
			}
		}
			$storedItem['qty']++;
			$storedItem['price']=$item->price_per_unit * $storedItem['qty'];
			$this->items[$id]= $storedItem; 
			$this->totalQty++;
			$this->totalPrice += $item->price_per_unit;
	}
}
