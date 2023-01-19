<div>
    <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Seleccionar recurso
        </h3>
    </div>
    <div class="bg-white px-4 sm:p-6">

        <div class="space-y-6 overflow-y-auto" style="max-height: calc(100vh - 210px);">
            @livewire(str_singular($table) . '::table', ['isInMenuItem' => true])
        </div>
    </div>
</div>
