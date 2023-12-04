<x-app-layout>
    <x-slot name="seo">
        @php
            $locales = Config::get('localized-routes.supported_locales');
        @endphp
        
        <link rel="canonical" href={{ route('home')}}>
        @for ($i = 0; $i < count($locales); $i++)
            <link rel="alternate" 
                hreflang="{{ strtolower(str_replace('_', '-', $locales[$i])) }}" 
                href={{ route('home', [], true, $locales[$i]) }} />
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

    <div class="bg-white">
		<div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
			<div class="mx-auto max-w-2xl text-center">
          		<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ __('pages.home.hero.title') }}</h2>
          		<p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-600">
					{{ __('pages.home.hero.sentence1') }}
					{{ __('pages.home.hero.sentence2') }}
				</p>
          		<div class="mt-10 flex items-center justify-center gap-x-6">
            		<a wire:navigate href="{{ route('news') }}" class="justify-center rounded-md bg-slate-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
						{{ __('pages.home.hero.button') }}
					</a>
          		</div>
        	</div>
      	</div>
    </div>

    <div class="bg-white py-24 sm:py-32">
    	<div class="mx-auto max-w-7xl px-6 lg:px-8">
        	<div class="-mx-6 grid grid-cols-2 gap-0.5 overflow-hidden sm:mx-0 sm:rounded-2xl md:grid-cols-3">
				@foreach ($sources as $source)
					<div class="bg-gray-400/5 grayscale hover:grayscale-0 p-8 sm:p-10">
						<img class="max-h-12 w-full object-contain" src="{{ $source->getLogoUrl() }}" alt="Transistor" width="158" height="48">
					</div>
				@endforeach
        	</div>
      	</div>
      
      	<div class="mt-16 flex justify-center">
        	<p class="relative rounded-full bg-gray-50 px-4 py-1.5 text-sm leading-6 text-gray-600 ring-1 ring-inset ring-gray-900/5">
            	<span class="hidden md:inline">Retrouvez l'actualité de plus de 1000 sites differents.</span>
            	<a wire:navigate href="{{ route('news') }}" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span> Voir toute l'actualité jeu vidéo <span aria-hidden="true">&rarr;</span></a>
          	</p>
        </div>
    </div>
</x-app-layout>
