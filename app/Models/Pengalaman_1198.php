<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengalaman_1198 extends Model
{
    use HasFactory;

    protected $table = 'pengalaman_1198';

    protected $fillable = [
        'posisi',
        'organisasi',
        'periode',
        'deskripsi'
    ];
}
