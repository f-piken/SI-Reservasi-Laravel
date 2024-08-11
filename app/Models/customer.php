<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'tb_customer';
    protected $primaryKey = 'ID_Customer';
    protected $guaded = ['ID_Customer'];

    public function User(){
        return $this->belongsTo(user::class,'ID_User');
    }
}
