<x-app-layout>
    <x-slot name="seo">  
        @php
            $locales = Config::get('locales.supported');
        @endphp      
        <link rel="canonical" href={{ localized_route('choose-country')}}>
        @for ($i = 0; $i < count($locales); $i++)
        <link rel="alternate" 
            hreflang="{{ strtolower(str_replace('_', '-', $locales[$i])) }}" 
            href={{ localized_route('choose-country', [], $locales[$i]) }} />
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
            {{ __('pages.choose-country-language.title') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <div class="mx-auto flex w-full max-w-7xl items-start gap-x-8 px-4 py-10 sm:px-6 lg:px-8">     
            <main class="flex-1">
                @foreach($locales_by_region as $region => $locales)
                    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
                        <h3 class="text-2xl font-bold leading-6 text-gray-900">{{ $region }}</h3> 
                    </div>
                    <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                        @foreach ($locales as $locale)
                            <li class="col-span-1 flex rounded-md shadow-sm">
                                <div class="flex w-16 flex-shrink-0 rounded-l-md">
                                    <a href="{{ route('language', $locale->name) }}">
                                    <img src="{{ $locale->country->getFlagUrl() }}" 
                                        alt="{{$locale->country->name_locale}}" 
                                        class="rounded-l-md h-full object-cover">
                                    </a>
                                </div>
                                <div class="flex flex-1 items-center justify-between truncate rounded-r-md border-b border-r border-t border-gray-200 bg-white">
                                    <div class="flex-1 truncate px-4 py-2 text-sm">
                                        <a href="{{ route('language', $locale->name) }}" class="font-medium text-gray-900 hover:text-gray-600">{{$locale->country->name_locale}}</a>
                                        <p class="text-gray-500">{{$locale->language->name_locale}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <br><br>
                @endforeach
            </main>
        </div>
    </div>
    

    
</x-app-layout>
