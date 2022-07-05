<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_producto';
    protected $keyType = 'string';
    protected $guarded = [''];
}
