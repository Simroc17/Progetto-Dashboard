<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaginaQta extends Model
{
    use HasFactory;
    protected $table = 'history_pagine_qta';
    protected $fillable=[
        'id_volantino',
    ];
}
