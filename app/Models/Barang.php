<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //menambahkan barang_id sebagai primary key,kategori_id sebagai foreign key,barang_kode(string 10),barang_nama(string 100),harga_beli(decimal),harga_jual(decimal)
    protected $primaryKey = 'barang_id';
    protected $fillable = ['kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual'];
}
