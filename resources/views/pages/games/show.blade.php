<x-app-layout>
    <x-slot name="seo">
        @php
            $locales = Config::get('localized-routes.supported_locales');
        @endphp
        
        <link rel="canonical" href={{ route('games.show', [$game->slug, $game->id])}}>
        @php $array_slug = $game->getTranslations('slug', $locales); @endphp
        @for ($i = 0; $i < count($locales); $i++)
        @php
            if(array_key_exists($locales[$i], $array_slug)) {
                $slug = $array_slug[$locales[$i]];
            } else {
                $first_key = key($array_slug);
                $slug = $array_slug[$first_key];
            }
        @endphp
        <link rel="alternate" 
            hreflang="{{ strtolower(str_replace('_', '-', $locales[$i])) }}"             
            href={{ route('games.show', [$slug, $game->id], true, $locales[$i]) }} />
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
            {{ $game->name }}
        </h2>
    </x-slot>
    
</x-app-layout>