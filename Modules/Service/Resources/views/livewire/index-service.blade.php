<div>
    @if ($services->count() > 0)
        <section class=" bg-orange-100">
            <div class="container mx-auto space-y-4 py-10">
                <h1 class="text-[#006699] text-4xl">Nuestros servicios</h1>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1 py-10 gap-2">
                    @foreach ($services as $service)
                        <x-posttemplate title="{{ str_limit($service->title, 100) }}"
                            description="{{ str_limit($service->description, 120) }}"
                            date="{{ $service->created_at->formatLocalized('%d de %B %Y') }}" class=""
                            publication_url="{{ $service->article_url }}" image="{{ $service->image }}">
                        </x-posttemplate>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
