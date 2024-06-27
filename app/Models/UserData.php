<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $table = 'user_data';
    protected $fillable = [
        'name',
        'birthday',
        'province',
        'municipality',
        'street',
        'nif',
        'position',
        'phone',
        'address_id'
    ];

    public function dataAdress(){
        return $this->belongsTo(Address::class, 'address_id');
    }

}
