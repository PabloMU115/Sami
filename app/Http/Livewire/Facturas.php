<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Factura;

class Facturas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_tenant, $id_cliente, $nombre_cliente, $numero_factura, $total, $tipo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.facturas.view', [
            'facturas' => Factura::latest()
						->orWhere('id_tenant', 'LIKE', $keyWord)
						->orWhere('id_cliente', 'LIKE', $keyWord)
						->orWhere('nombre_cliente', 'LIKE', $keyWord)
						->orWhere('numero_factura', 'LIKE', $keyWord)
						->orWhere('total', 'LIKE', $keyWord)
						->orWhere('tipo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_tenant = null;
		$this->id_cliente = null;
		$this->nombre_cliente = null;
		$this->numero_factura = null;
		$this->total = null;
		$this->tipo = null;
    }

    public function store()
    {
        $this->validate([
		'id_tenant' => 'required',
		'id_cliente' => 'required',
		'nombre_cliente' => 'required',
		'numero_factura' => 'required',
		'total' => 'required',
		'tipo' => 'required',
        ]);

        Factura::create([ 
			'id_tenant' => $this-> id_tenant,
			'id_cliente' => $this-> id_cliente,
			'nombre_cliente' => $this-> nombre_cliente,
			'numero_factura' => $this-> numero_factura,
			'total' => $this-> total,
			'tipo' => "1"
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Factura Successfully created.');
    }

    public function edit($id)
    {
        $record = Factura::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_tenant = $record-> id_tenant;
		$this->id_cliente = $record-> id_cliente;
		$this->nombre_cliente = $record-> nombre_cliente;
		$this->numero_factura = $record-> numero_factura;
		$this->total = $record-> total;
		$this->tipo = $record-> tipo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_tenant' => 'required',
		'id_cliente' => 'required',
		'nombre_cliente' => 'required',
		'numero_factura' => 'required',
		'total' => 'required',
		'tipo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Factura::find($this->selected_id);
            $record->update([ 
			'id_tenant' => $this-> id_tenant,
			'id_cliente' => $this-> id_cliente,
			'nombre_cliente' => $this-> nombre_cliente,
			'numero_factura' => $this-> numero_factura,
			'total' => $this-> total,
			'tipo' => $this-> tipo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Factura Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Factura::where('id', $id);
            $record->delete();
        }
    }
}
