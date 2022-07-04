<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_expediente';
    protected $keyType = 'string';
    protected $guarded = [''];
}
