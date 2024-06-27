<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoNew extends Model
{
    use HasFactory;
    protected $table = 'info_news';
    protected $fillable = [
        'title',
        'content',
        'cover_photo',
        'font',
        'user_id'
    ];

    public function user () {
        return $this->hasOne(User::class);
    }






}
