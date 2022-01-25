<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idoso extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_resp',
        'email',
        'telefone',
        'data_nasc',
        'image',
        'user_id',
    ];
}
