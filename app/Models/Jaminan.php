<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jaminan extends Model
{
    protected $table = 'tipe_jaminan';

    protected $fillable = [
        'tipe'
    ];

    public $timestamps = false;
}