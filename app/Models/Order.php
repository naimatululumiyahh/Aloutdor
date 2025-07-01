<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'code',
        'tipe_jaminan',
        'total_price',
        'status',
        'qr_code_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jaminan()
    {
        return $this->belongsTo(Jaminan::class, 'tipe_jaminan', 'id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}