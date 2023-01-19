<x-app-layout>
    @section('title', 'Crear ítem de menú')
    <div>
        <div class="card">

            <div class="flex justify-between">
                <h2 class="mb-5">Ítems de menú</h2>
                <div>
                    <span class="error">*</span>
                    <span class="dark:text-gray-200"> = requerido</span>
                </div>
            </div>


            @livewire('menuitem::menu-item-form')
            @include('errors.messages')

        </div>
    </div>
</x-app-layout>
