<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'apply';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username_mhs', 'id_internship', 'status',
    ];
}
