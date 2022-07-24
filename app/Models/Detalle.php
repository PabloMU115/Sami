<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'detalles';

    protected $fillable = ['id_tenant','descripcion','categoria','cantidad','precio','subtotal','numero_factura'];
	
}
