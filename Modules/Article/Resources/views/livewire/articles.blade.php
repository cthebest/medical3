<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
        @foreach ($articles as $article)
            <x-posttemplate title="{{ str_limit($article->title, 100) }}"
                description="{{ str_limit($article->body, 120) }}"
                date="{{ $article->created_at->formatLocalized('%d de %B %Y') }}" 
                publication_url="{{ $article->url }}"
                image="">
            </x-posttemplate>
        @endforeach
    </div>
    <div class="p-4">
        {{ $articles->links() }}
    </div>
</div>
