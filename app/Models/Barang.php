<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang'; // Nama tabel di database
    
    // Jika tidak pakai kolom created_at dan updated_at:
    public $timestamps = false;
}