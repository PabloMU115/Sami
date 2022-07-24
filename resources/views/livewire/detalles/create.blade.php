<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Detalle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id_tenant"></label>
                        <input wire:model="id_tenant" hidden type="text" class="form-control" id="id_tenant"
                            placeholder="Id Tenant">
                        @error('id_tenant')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="categoria"></label>
                        <input wire:model="categoria" maxlength="20" type="text" class="form-control" id="categoria"
                            placeholder="Categoria">
                        @error('categoria')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cantidad"></label>
                        <input wire:model="cantidad" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" type="text" class="form-control" id="cantidad"
                            placeholder="Cantidad">
                        @error('cantidad')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="precio"></label>
                        <input wire:model="precio" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" class="form-control" id="precio"
                            placeholder="Precio">
                        @error('precio')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion"></label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion"
                            placeholder="Descripcion">
                        @error('descripcion')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subtotal"></label>
                        <input wire:model="subtotal" hidden type="text" class="form-control" id="subtotal"
                            placeholder="Subtotal">
                        @error('subtotal')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="numero_factura"></label>
                        <input wire:model="numero_factura" hidden type="text" class="form-control"
                            id="numero_factura" placeholder="Numero Factura">
                        @error('numero_factura')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
