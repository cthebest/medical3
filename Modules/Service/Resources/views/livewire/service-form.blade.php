<div>
    @include('errors.messages')
    <x-form.input name="title" id="title" label="Título" wire:model="service.title"></x-form.input>
    <div>
        <x-form.input wire:model="image" type="file" label='Image' name='image'></x-form.input>
        @if (isset($image))
            Photo Preview:
            <img src="{{ $image->temporaryUrl() }}" width="100px" class="mb-5">
        @else
            <img src="{{ storage_url($service->image) }}" width="100px" class="mb-5">
        @endif
    </div>

    <div class="w-full flex items-center" x-on:resource-updated.window="on = false">
        <x-form.input label="Seleccione un recurso" class="w-full bg-gray-200" wire:model="resource_title" disabled>
        </x-form.input>
        <button type="button" class="btn btn-primary m-0" wire:click="openResourceModal">Seleccionar</button>
    </div>

    <div>
        <x-form.textarea name="description" label="Descripción" wire:model="service.description"></x-form.textarea>
    </div>

    <x-button wire:click="store" class="mt-4">Guardar</x-button>
</div>
