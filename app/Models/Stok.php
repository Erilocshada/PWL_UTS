<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    //menambahkan stok_id sebagai primary key,supplier_id sebagai foreign key,barang_id sebagai foreign key, user_id sebagai foreign key, stok_tanggal(datetime),stok_jumlah(integer)
    protected $primaryKey = 'stok_id';
    protected $fillable = ['supplier_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah'];
}
