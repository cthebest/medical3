<div class="h-4/5">
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
    </header>
</div>
