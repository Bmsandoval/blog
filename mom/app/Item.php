<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function scopeForSale($query) {
        return $query->Where('price','>',0);
    }
    public function scopeDiscontinued($query) {
        return $query->Where('price',0);
    }
    public function scopeDiscounted($query) {
        return $query->Where('discount','>',0);
    }
    public static function price_with_tax($id){
        $tax_rate = .25;
        return (1-$tax_rate) * static::Where('id',$id)->get('price');
    }
}
