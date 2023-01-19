<div>
    @if (can('add_articles'))
        <a href="{{ route('articles.create') }}" class="text-white p-2 btn btn-primary mb-4">Crear artículo</a>
    @endif

    <x-form.input label="Buscar" name="query" wire:model.debounce.500ms="query"></x-form.input>
    <div class="overflow-x-auto shadow-md mb-4">
        <table class="table-auto">
            <thead>
                <tr>
                    <th><a href="#">Título</a></th>
                    <th><a href="#">Usuario</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>

                            <div class="p-2">{{ $article->title }}</div>
                        </td>

                        <td>
                            <div class="p-2">{{ $article->user->name }}</div>
                        </td>

                        <td>

                            @if (!$isInMenuItem)
                                <div class="flex space-x-2">
                                    @if (can('edit_articles'))
                                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}">Edit</a>
                                    @elseif(auth()->id() === $article->id && can('edit_own_account'))
                                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}">Edit</a>
                                    @endif


                                    @if (can('delete_articles'))
                                        <x-modal>
                                            <x-slot name="trigger">
                                                <a href="#" @click="on = true">Eliminar</a>
                                            </x-slot>

                                            <x-slot name="title">Confirmación</x-slot>

                                            <x-slot name="content">
                                                <div class="text-center">
                                                    Estás seguro que deseas eliminar el artículo:
                                                    <b>{{ $article->title }}</b>
                                                </div>
                                            </x-slot>

                                            <x-slot name="footer">
                                                <button @click="on = false">Cancelar</button>
                                                <button class="btn btn-red"
                                                    wire:click="deleteArticle('{{ $article->id }}')">Eliminar
                                                    artículo</button>
                                            </x-slot>
                                        </x-modal>
                                    @endif
                                </div>
                            @else
                                <button type="button" wire:click="resourceAdded({{ $article }})">Añadir</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $articles->links() }}
    </div>
</div>
