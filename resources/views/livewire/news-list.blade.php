<div class="mx-auto flex w-full max-w-7xl items-start gap-x-8 px-4 py-10 sm:px-6 lg:px-8">
    <aside class="sticky top-8 hidden w-44 shrink-0 lg:block">
        <div>
            @php
                $languages = Config::get('locales.languages');
            @endphp   
            <label for="language" 
                class="block text-sm font-medium leading-6 text-gray-900"
            >{{ __('pages.news.media_language') }}</label>
            <select 
                id="language" 
                name="language"
                wire:model.live="language" 
                class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
            >
                @foreach ($languages as $key => $value)
                    <option value="{{ $value }}">{{ __('locales.language.'.$value) }}</option>
                @endforeach
            </select>
          </div>
    </aside>

    <main class="flex-1">
        <div role="list" class="space-y-6">
    
            @foreach ($news_list as $news)
                <x-news.card  wire:key="{{ $news->id }}" :news="$news" />
            @endforeach
            
            <noscript>
                @if($news_list->currentPage() > 1)
                    <a href="{{$news_list->path()}}?page={{$news_list->currentPage()-1}}">{{ __('previous') }}</a>
                @endif
                @if($news_list->currentPage() < $news_list->lastPage())
                    <a href="{{$news_list->path()}}?page={{$news_list->currentPage()+1}}">{{ __('next') }}</a>
                @endif
            </noscript>
        
            <div
                x-data="{
                    observe () {
                        let observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    @this.call('loadMore')
                                }
                            })
                        }, {
                            root: null
                        })
            
                        observer.observe(this.$el)
                    }
                }"
                x-init="observe"
            ></div>
        </div>
    </main>
</div>