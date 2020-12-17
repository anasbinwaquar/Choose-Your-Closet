<?php

namespace App\Providers;	
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart 
{
    public $items=null;
	public $totalQty=0;
	public $totalPrice=0;

	public function __construct($oldCart){
		if($oldCart!=null){
			$this->items=$oldCart->items;
			$this->totalPrice=$oldCart->totalPrice;
			$this->totalQty=$oldCart->totalQty;
		}
	}
	public function add($Rent_item,$id,$ProductData){
		$storedItem=['qty'=>0,'price'=>$Rent_item->charges,'item'=>$Rent_item];
		if($this->items){
			if(array_key_exists($id,$this->items)){
				$storedItem=$this->items[$id];

			}
		}
			$storedItem['qty']++;
			$storedItem['price']=$Rent_item->charges * $storedItem['qty'];
			$this->items[$id]= $storedItem; 
			$this->totalQty++;
			$this->totalPrice += $Rent_item->charges;
	}
}
