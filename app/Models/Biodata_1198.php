<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_1198 extends Model
{
    use HasFactory;

    protected $table = 'biodata_1198';

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_hp',
        'foto',
    ];
}
