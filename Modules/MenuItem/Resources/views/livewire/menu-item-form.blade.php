<div>
    <div>
        @include('errors.messages')
        <x-form.input wire:model="menuItem.title" label='Título' name='title' required></x-form.input>
        <x-form.input wire:model="menuItem.icon" label='Ícono' name='icon'></x-form.input>
        @if ($menuItemOrders)
            <x-form.select label="Orden" name="module" placeholder="-- Seleccione un orden --"
                wire:model='menuItem.order' wire:change="loadOrder">
                @foreach ($menuItemOrders as $key => $menuItemOrder)
                    <option value="{{ $menuItemOrder->order }}">{{ $menuItemOrder->order }}</option>
                @endforeach
            </x-form.select>
        @endif
        <livewire:menuitem::association :module_id="$module_id" :resource_id="$resource_id" />
        <x-button wire:click="store" class="mt-4">Guardar</x-button>
    </div>
</div>
