<div>
    @if (can('add_services'))
        <a href="{{ route('services.create') }}" class="text-white p-2 btn btn-primary mb-4">Crear servicio</a>
    @endif
    <x-form.input label="Buscar" name="query" wire:model.debounce.500ms="query"></x-form.input>
    <div class="overflow-x-auto shadow-md mb-4">
        <table class="table-auto">
            <thead>
                <tr>
                    <th><a href="#">Título</a></th>
                    <th><a href="#">alias</a></th>
                    <th><a href="#">descripción</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>

                            <div class="p-2">{{ $service->title }}</div>
                        </td>

                        <td>
                            <div class="p-2">{{ $service->alias }}</div>
                        </td>
                        <td>
                            <div class="p-2">{{ $service->description }}</div>
                        </td>

                        <td>

                            <div class="flex space-x-2">
                                @if (can('edit_services'))
                                    <a href="{{ route('services.edit', ['service' => $service->id]) }}">Edit</a>
                                @elseif(auth()->id() === $service->id && can('edit_own_account'))
                                    <a href="{{ route('services.edit', ['service' => $service->id]) }}">Edit</a>
                                @endif


                                @if (can('delete_services'))
                                    <x-modal>
                                        <x-slot name="trigger">
                                            <a href="#" @click="on = true">Eliminar</a>
                                        </x-slot>

                                        <x-slot name="title">Confirmación</x-slot>

                                        <x-slot name="content">
                                            <div class="text-center">
                                                Estás seguro que deseas eliminar el artículo:
                                                <b>{{ $service->title }}</b>
                                            </div>
                                        </x-slot>

                                        <x-slot name="footer">
                                            <button @click="on = false">Cancelar</button>
                                            <button class="btn btn-red"
                                                wire:click="deleteService('{{ $service->id }}')">Eliminar
                                                servicio</button>
                                        </x-slot>
                                    </x-modal>
                                @endif
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $services->links() }}
    </div>
</div>
