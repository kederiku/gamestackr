<footer class="bg-white" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
        <div class="mt-8 border-t border-gray-900/10 pt-8 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">
                <a href='{{ localized_route('choose-country')}}' class="text-gray-400 hover:text-gray-500">
                    {{ __('layout.footer.choose_country') }}
                    <img 
                        src="{{ asset('storage/countries/flag/'.explode("_", app()->getLocale())[1].'.svg') }}"
                        class=" rounded-full inline-block w-6 h-6 ml-1">
                </a>
            </div>
            <p class="mt-8 text-xs leading-5 text-gray-500 md:order-1 md:mt-0">&copy; {{ now()->year }} {{ config('app.name', 'Laravel') }}, {{ __('layout.footer.all_rights_reserved') }}</p>
        </div>
    </div>
</footer>