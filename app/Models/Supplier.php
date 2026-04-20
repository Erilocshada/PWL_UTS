<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //menambahkan supplier_id sebagai primary key,supplier_kode(string 10),supplier_nama(string 100),supplier_alamat(string 255)
    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';
    protected $fillable = ['supplier_kode', 'supplier_nama', 'supplier_alamat'];

    function stok()
    {
        return $this->hasMany(Stok::class, 'supplier_id', 'supplier_id');
    }
}
