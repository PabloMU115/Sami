<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_tenant"></label>
                <input wire:model="id_tenant" type="text" class="form-control" id="id_tenant" placeholder="Id Tenant">@error('id_tenant') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="id_cliente"></label>
                <input wire:model="id_cliente" type="text" class="form-control" id="id_cliente" placeholder="Id Cliente">@error('id_cliente') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nombre_cliente"></label>
                <input wire:model="nombre_cliente" type="text" class="form-control" id="nombre_cliente" placeholder="Nombre Cliente">@error('nombre_cliente') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="numero_factura"></label>
                <input wire:model="numero_factura" type="text" class="form-control" id="numero_factura" placeholder="Numero Factura">@error('numero_factura') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="total"></label>
                <input wire:model="total" type="text" class="form-control" id="total" placeholder="Total">@error('total') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="tipo"></label>
                <input wire:model="tipo" type="text" class="form-control" id="tipo" placeholder="Tipo">@error('tipo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
