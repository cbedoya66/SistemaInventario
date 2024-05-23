<div class="space-y-6">
    
    <div>
        <x-input-label for="pedido_id" :value="__('Pedido Id')"/>
        <x-text-input id="pedido_id" name="pedido_id" type="text" class="mt-1 block w-full" :value="old('pedido_id', $pedidoProducto?->pedido_id)" autocomplete="pedido_id" placeholder="Pedido Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('pedido_id')"/>
    </div>
    <div>
        <x-input-label for="producto_id" :value="__('Producto Id')"/>
        <x-text-input id="producto_id" name="producto_id" type="text" class="mt-1 block w-full" :value="old('producto_id', $pedidoProducto?->producto_id)" autocomplete="producto_id" placeholder="Producto Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('producto_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>