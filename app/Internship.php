<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $table = 'internship';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'kuota', 'apply', 'kategori', 'deskripsi','companies', 'create_by',
    ];
}
