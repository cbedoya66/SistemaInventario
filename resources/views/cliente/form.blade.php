<div class="space-y-6">
    
    <div>
        <x-input-label for="cedula" :value="__('Cedula')"/>
        <x-text-input id="cedula" name="cedula" type="text" class="mt-1 block w-full" :value="old('cedula', $cliente?->cedula)" autocomplete="cedula" placeholder="Cedula"/>
        <x-input-error class="mt-2" :messages="$errors->get('cedula')"/>
    </div>
    <div>
        <x-input-label for="nombre" :value="__('Nombre')"/>
        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $cliente?->nombre)" autocomplete="nombre" placeholder="Nombre"/>
        <x-input-error class="mt-2" :messages="$errors->get('nombre')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>