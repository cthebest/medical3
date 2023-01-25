<div>
    <section>
        <div class="container mx-auto py-10 space-y-4">
            <h1 class="text-[#006699] text-4xl">Nuestras últimas publicaciones</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                @foreach ($articles as $article)
                    <x-posttemplate title="{{ str_limit($article->title, 100) }}"
                        description="{{ str_limit($article->body, 120) }}"
                        date="{{ $article->created_at->formatLocalized('%d de %B %Y') }}"
                        publication_url="{{ $article->url }}" image="{{ $article->image }}" image_class="w-full">
                    </x-posttemplate>
                @endforeach
            </div>
        </div>
    </section>
</div>
