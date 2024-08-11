<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'tb_reservasi';
    protected $primaryKey = 'ID_Reservasi';
    protected $guaded = ['ID_Reservasi'];
    public function room(){
        return $this->belongsTo(Room::class,'ID_Room');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'ID_Customer');
    }
}
