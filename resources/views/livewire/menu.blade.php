<div class="h-3/4">
    <header class="bg-header-clinic bg-no-repeat bg-cover h-full w-full">
        <nav class="flex items-center justify-between bg-[#006699] text-white px-2 py-4 fixed w-full shadow">
            <div class="">
                <img src="../imgs/logoenoe.png" alt="logo" class="w-40 object-cover" />

            </div>
            <div class="flex items-center">
                @foreach ($menuItems as $menuItem)
                    <div class="flex flex-col items-center justify-center">
                        <i class="{{ $menuItem->icon }}"></i>
                        <a href="{{ $menuItem->path }}"
                            class="rounded-full hover:text-[#c7f768] px-3 py-2 text-center w-full">
                            {{ $menuItem->title }}
                        </a>
                    </div>
                @endforeach

            </div>
        </nav>

        <div class="w-48 pt-36 md:pt-36 lg:pt-52 sm:w-1/3 lg:w-1/3 px-6">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-semibold">¿Necesitas ayuda con un integrante de la familia?</h1>
            <span class="block">No dudes en contactarnos</span>
            <div class="mt-2">
                <a class="bg-[#79b320] p-2 rounded-full" href="#">Reservar cita</a>
            </div>
        </div>
    </header>
</div>
