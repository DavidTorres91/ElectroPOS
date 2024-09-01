@extends('layout')

@section('title', 'Crear Factura')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <h2 class="text-center">Crear Factura</h2>
        <form id="facturaForm" action="{{ route('facturas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productos">Productos:</label>
                <div id="productosContainer"></div>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addProductModal">Agregar Producto</button>
            </div>
            <div class="form-group">
                <label for="total_sin_iva">Total sin IVA:</label>
                <input type="text" id="total_sin_iva" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="iva">IVA:</label>
                <input type="text" id="iva" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="total_con_iva">Total con IVA:</label>
                <input type="text" id="total_con_iva" class="form-control" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Crear Factura</button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="producto_id">Producto:</label>
                    <select id="producto_id" class="form-control">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" class="form-control" min="1" value="1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="addProductButton">Agregar Producto</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addProductButton = document.getElementById('addProductButton');
        const productosContainer = document.getElementById('productosContainer');
        const totalSinIvaInput = document.getElementById('total_sin_iva');
        const ivaInput = document.getElementById('iva');
        const totalConIvaInput = document.getElementById('total_con_iva');
        const ivaRate = 0.16; // 16% IVA

        addProductButton.addEventListener('click', function () {
            const productoSelect = document.getElementById('producto_id');
            const selectedOption = productoSelect.options[productoSelect.selectedIndex];
            const productoId = selectedOption.value;
            const productoNombre = selectedOption.text;
            const productoPrecio = parseFloat(selectedOption.getAttribute('data-precio'));
            const cantidad = parseInt(document.getElementById('cantidad').value);

            const productoRow = document.createElement('div');
            productoRow.classList.add('producto-row');
            productoRow.innerHTML = `
                <input type="hidden" name="productos[${productoId}][id]" value="${productoId}">
                <input type="hidden" name="productos[${productoId}][cantidad]" value="${cantidad}">
                <input type="hidden" name="productos[${productoId}][precio_unitario]" value="${productoPrecio}">
                <div class="form-group">
                    <label>Producto:</label>
                    <p>${productoNombre} - ${cantidad} x $${productoPrecio.toFixed(2)}</p>
                </div>
            `;

            productosContainer.appendChild(productoRow);

            updateTotals();

            $('#addProductModal').modal('hide');
        });

        function updateTotals() {
            let totalSinIva = 0;

            document.querySelectorAll('.producto-row').forEach(row => {
                const cantidad = parseInt(row.querySelector('input[name*="[cantidad]"]').value);
                const precio = parseFloat(row.querySelector('input[name*="[precio_unitario]"]').value);
                totalSinIva += cantidad * precio;
            });

            const iva = totalSinIva * ivaRate;
            const totalConIva = totalSinIva + iva;

            totalSinIvaInput.value = totalSinIva.toFixed(2);
            ivaInput.value = iva.toFixed(2);
            totalConIvaInput.value = totalConIva.toFixed(2);
        }
    });
</script>
@endsection
