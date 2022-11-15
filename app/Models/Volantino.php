<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volantino extends Model
{
    use HasFactory;
    protected $table = 'volantino';
    protected $fillable=[
        'id_promo',
    ];
}
