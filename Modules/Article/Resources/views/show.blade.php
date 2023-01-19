@extends('layouts.web')
@section('content')
    <div class="container mx-auto py-10 px-6">
        @if ($article->image)
            <img src="" alt="">
        @endif
        <h1 class="text-4xl">{{ $article->title }}</h1>
        <span class="block text-gray-400">{{ $article->created_at->formatLocalized('%d de %B %Y') }}</span>
        {!! $article->body !!}
    </div>
@endsection
