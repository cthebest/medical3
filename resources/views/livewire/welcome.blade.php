<layouts-web>
    @section('content')
        <div>
            <livewire:service::index-service />
            <section class="bg-[#edfdcb]">
                <div class="container mx-auto py-10 space-y-4">
                    <h1 class="text-[#006699] text-4xl">Nuestras últimas publicaciones</h1>
                    <livewire:article::index-articles />
                </div>
            </section>

            <section class="space-y-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d120689.12363162886!2d-98.26300596649035!3d19.04019627469931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1673910984785!5m2!1ses-419!2sco"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="w-full"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
        </div>
    @endsection
</layouts-web>
