<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_perusahaan', 'email', 'alamat', 'jenis_usaha','telp', 'logo', 'create_by',
    ];

}
