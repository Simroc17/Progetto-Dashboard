<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interattivi extends Model
{
    use HasFactory;
    protected $table = 'history_interattivi';
    protected  $fillable = [
        'id_promo',
        ];
    
}
