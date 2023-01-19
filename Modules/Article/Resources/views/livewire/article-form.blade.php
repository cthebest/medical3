<div>
    @include('errors.messages')
    <x-form.input name="title" id="title" label="Título" wire:model="article.title"></x-form.input>
    <div>
        <x-form.input wire:model="image" type="file" label='Image' name='image'></x-form.input>
        @if (isset($image))
            Photo Preview:
            <img src="{{ $image->temporaryUrl() }}" width="100px" class="mb-5">
        @else
            <img src="{{ storage_url($article->image) }}" width="100px" class="mb-5">
        @endif
    </div>

    <div>
        <x-form.textarea name="description" label="Descripción" wire:model="article.body"></x-form.textarea>
    </div>

    <x-button wire:click="store" class="mt-4">Guardar</x-button>
</div>
