<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //menambahkan kategori_id sebagai primary key,kategori_kode(string 10),kategori_nama(string 100)
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['kategori_kode', 'kategori_nama'];
    function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'kategori_id');
    }
}
