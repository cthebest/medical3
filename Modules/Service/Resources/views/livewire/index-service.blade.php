<div>
    @if ($services->count() > 0)
        <section>
            <div class="container mx-auto space-y-4 py-10">
                <h1 class="text-[#006699] text-4xl">¡Acércate a nosotros para informarte, descubrir un posible
                    trastorno o problema neurólogico, es importante realizar un estudio a fondo!</h1>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1 py-10 gap-2">
                    @foreach ($services as $service)
                        <x-posttemplate title="{{ str_limit($service->title, 100) }}"
                            description="{{ str_limit($service->description, 120) }}"
                            date="{{ $service->created_at->formatLocalized('%d de %B %Y') }}" image_class=""
                            publication_url="{{ $service->article_url }}" image="{{ $service->image }}">
                        </x-posttemplate>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
