<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model {
    protected $table = 'cart_items';
    protected $fillable = ['cart_id', 'id_barang', 'start_date', 'end_date', 'qty', 'subtotal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
    
    public function cart() {
        return $this->belongsTo(Cart::class);
    }
    

    public $timestamps = false;
}