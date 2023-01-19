<div>
    @if (can('add_menus'))
        <a href="{{ route('menuitems.create') }}" class="text-white p-2 btn btn-primary mb-4">Crear menú</a>
    @endif
    <div class="overflow-x-scroll shadow-md mb-4">
        <table>
            <thead>
                <tr>
                    <th><a href="#" wire:click.prevent="sortBy('first_name')">Título</a></th>
                    <th><a href="#" wire:click.prevent="sortBy('email')">Alias</a></th>
                    <th><a href="#">Link</a></th>
                    <th>Asociación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuItems as $menuItem)
                    <tr>
                        <td class="flex">

                            <div class="pl-1 pt-1">{{ $menuItem->title }}</div>
                        </td>
                        <td>
                            <div class="pl-1 pt-1">{{ $menuItem->alias }}</div>
                        </td>
                        <td>
                            <div class="pl-1 pt-1">{{ $menuItem->path }}</div>
                        </td>

                        <td>
                            <div class="pl-1 pt-1">{{ json_encode($menuItem->association) }}</div>
                        </td>

                        <td>
                            <div class="flex space-x-2">
                                @if (can('edit_menus'))
                                    <a href="{{ route('menuitems.edit', ['menuitem' => $menuItem->id]) }}">Edit</a>
                                @endif



                                @if (can('delete_menus'))
                                    <x-modal>
                                        <x-slot name="trigger">
                                            <a href="#" @click="on = true">Eliminar</a>
                                        </x-slot>

                                        <x-slot name="title">Confirmación</x-slot>

                                        <x-slot name="content">
                                            <div class="text-center">
                                                Estás seguro que deseas eliminar a: <b>{{ $menuItem->title }}</b>
                                            </div>
                                        </x-slot>

                                        <x-slot name="footer">
                                            <button @click="on = false">Cancelar</button>
                                            <button class="btn btn-red"
                                                wire:click="deleteMenuItem('{{ $menuItem->id }}')">Eliminar ítem de
                                                menú
                                            </button>
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
        {{ $menuItems->links() }}
    </div>

</div>
