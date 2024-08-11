<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'tb_pembayaran';
    protected $primaryKey = 'ID_Pembayaran';
    protected $guaded = ['ID_Pembayaran'];
    public function reservasi(){
        return $this->belongsTo(Reservasi::class,'ID_Reservasi');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'ID_Customer');
    }
}
