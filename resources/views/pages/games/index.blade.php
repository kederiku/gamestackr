<x-app-layout>
    <x-slot name="seo">
        @php
            $locales = Config::get('localized-routes.supported_locales');
        @endphp
        
        <link rel="canonical" href={{ route('games')}}>
        @for ($i = 0; $i < count($locales); $i++)
        <link rel="alternate" 
            hreflang="{{ strtolower(str_replace('_', '-', $locales[$i])) }}" 
            href={{ route('games', [], true, $locales[$i]) }} />
        @endfor
        {{--
        <meta name="description" content="{{ __('news.description') }}">
        <meta name="keywords" content="{{ __('news.keywords') }}">
        <meta property="og:title" content="{{ __('news.title') }}">
        <meta property="og:description" content="{{ __('news.description') }}">
        <meta property="og:image" content="{{ asset('images/og-image.png') }}">
        <meta property="og:url" content="{{ route('news.index') }}">
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@">
        <meta name="twitter:title" content="{{ __('news.title') }}">
        <meta name="twitter:description" content="{{ __('news.description') }}">
        <meta name="twitter:image" content="{{ asset('images/og-image.png') }}">
        <meta name="twitter:image:alt" content="{{ __('news.title') }}">
        --}}
    </x-slot>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('pages.games.title') }}
        </h2>
    </x-slot>

    @foreach($games as $game)
        <a href="{{ route('games.show', [$game->slug, $game->id]) }}">
            <div class="flex flex-col items-center justify-center w-full h-64 bg-cover bg-center bg-no-repeat" style="background-image: url({{ $game->image }})">
                <div class="flex flex-col items-center justify-center w-full h-full bg-black bg-opacity-50">
                    <h1 class="text-3xl font-bold text-white">{{ $game->name }}</h1>
                    <img class="w-32 h-32" src="{{ $game->getImageUrl() }}" alt="{{ $game->name }}">
                </div>
            </div>
        </a>
    @endforeach
</x-app-layout>