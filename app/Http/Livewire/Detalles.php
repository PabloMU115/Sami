<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Detalle;
use Illuminate\Support\Facades\Auth;

class Detalles extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $id_tenant, $descripcion, $categoria, $cantidad, $precio, $subtotal, $numero_factura, $inventarioelegido;
	public $updateMode = false;
	public $title;
	public $clientes;
	public $inventario;
	public function render()
	{


		$keyWord = '%' . $this->keyWord . '%';
		return view('livewire.detalles.view', [
			'detalles' => Detalle::latest()
				->where('numero_factura', '=', $this->title)
				->paginate(10)
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
		$this->descripcion = null;
		$this->categoria = null;
		$this->cantidad = null;
		$this->precio = null;
		$this->subtotal = null;
		$this->numero_factura = null;
	}

	public function store()
	{
		$this->validate([
			'descripcion' => 'required',
			'categoria' => 'required',
			'cantidad' => 'required',
			'precio' => 'required',
		]);

		Detalle::create([
			'id_tenant' => Auth::user()->id,
			'descripcion' => $this->descripcion,
			'categoria' => $this->categoria,
			'cantidad' => $this->cantidad,
			'precio' => $this->precio,
			'subtotal' => $this->precio * $this->cantidad,
			'numero_factura' => $this->title
		]);

		$this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Detalle Successfully created.');
	}

	public function edit($id)
	{
		$record = Detalle::findOrFail($id);

		$this->selected_id = $id;
		$this->id_tenant = $record->id_tenant;
		$this->descripcion = $record->descripcion;
		$this->categoria = $record->categoria;
		$this->cantidad = $record->cantidad;
		$this->precio = $record->precio;
		$this->subtotal = $record->subtotal;
		$this->numero_factura = $record->numero_factura;

		$this->updateMode = true;
	}

	public function update()
	{
		$this->validate([
			'descripcion' => 'required',
			'categoria' => 'required',
			'cantidad' => 'required',
			'precio' => 'required',
		]);

		if ($this->selected_id) {
			$record = Detalle::find($this->selected_id);
			$record->update([
				'id_tenant' => $this->id_tenant,
				'descripcion' => $this->descripcion,
				'categoria' => $this->categoria,
				'cantidad' => $this->cantidad,
				'precio' => $this->precio,
				'subtotal' => $this->precio * $this->cantidad,
				'numero_factura' => $this->numero_factura
			]);

			$this->resetInput();
			$this->updateMode = false;
			session()->flash('message', 'Detalle Successfully updated.');
		}
	}

	public function destroy($id)
	{
		if ($id) {
			$record = Detalle::where('id', $id);
			$record->delete();
		}
	}
}
