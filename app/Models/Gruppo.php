<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gruppo extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        
        'email',
        'password',];
}
