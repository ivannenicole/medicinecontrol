<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministracao extends Model
{
    use HasFactory;

    protected $fillable = [
        'med_id',
        'idoso_id',
        'frequencia',
        'dosagem',
        'unidades',
        'user_id',
    ];

    protected $table = 'ministracao';
}
