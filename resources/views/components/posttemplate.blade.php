@props(['image', 'title', 'description', 'date', 'publication_url', 'class'])

<div class="bg-white rounded-lg overflow-hidden">
    @if ($image)
        <div class="flex justify-center">
            <img class="{{ $class }}" src="{{ storage_url($image) }}" alt="Image">
        </div>
    @endif
    <div class="p-4">
        <h2 class="text-xl font-medium">{{ $title }}</h2>
        <p class="text-sm text-gray-400">{{ $date }}</p>
        <p class="text-base">{{ $description }}</p>

    </div>
    <div class="p-4">
        <a href="{{ $publication_url }}" class="bg-[#006699] text-white 
    p-2 rounded-lg hover:bg-blue-600">
            Leer más
        </a>
    </div>
</div>
