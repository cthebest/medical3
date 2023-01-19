<div>
    <div class="mb-4">
        <label for="module_id" class="block text-sm font-medium leading-5 text-gray-700 dark:text-gray-200">
            Módulos
        </label>

        <select name="module_id" id="module_id" wire:model='module_id' wire:change="loadResources"
            class="border border-gray-300 dark:bg-gray-500 dark:text-gray-200 p-1 w-full rounded">
            <option value="">-- Seleccione un módulo --</option>
            @foreach ($modules as $key => $module)
                <option value="{{ $module->id }}">{{ $module->label }}</option>
            @endforeach
        </select>
    </div>

    @if ($table)
        <div class="w-full flex items-center" x-on:resource-updated.window="on = false">
            <x-form.input label="Seleccione un recurso" class="w-full bg-gray-200" wire:model="title" disabled>
            </x-form.input>
            <button type="button" class="btn btn-primary m-0" wire:click="openResourceModal">Seleccionar</button>
        </div>
    @endif

</div>
