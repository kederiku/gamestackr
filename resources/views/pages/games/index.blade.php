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
    
</x-app-layout>