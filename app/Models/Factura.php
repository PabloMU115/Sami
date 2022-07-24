<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'facturas';

    protected $fillable = ['id_tenant','id_cliente','nombre_cliente','numero_factura','total','tipo'];
	
}
