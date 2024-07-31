<?php

namespace App\Models;

use App\Models\Barang;
use App\Models\Buah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primarykey = 'id';
    protected $table = 'transaksi';
    protected $fillable = [
    'id_buah','tgl_transaksi', 'jumlah_beli','jumlah_bayar'
];

    public function buah(){
        return $this->belongsTo(Buah::class,'id_buah');
    }
   
}
