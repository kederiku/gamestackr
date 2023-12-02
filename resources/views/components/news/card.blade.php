@props(['news'])

<div class="flex bg-white shadow rounded-lg">
    @if($news->image)
        <div class="flex-none w-48 relative hidden sm:block">
            <img src="{{$news->image}}" alt="{{$news->title}}" 
                class="absolute inset-0 rounded-l-lg w-full h-full object-cover" loading="lazy"/>
        </div>
    @endif
    <div class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h3 class="tracking-tight flex-auto text-lg font-semibold">
                <a href="{{$news->link}}" target="_blank">{{$news->title}}</a>
            </h3>
        </div>
        <div class="flex space-x-4 mb-6 font-normal hidden sm:block">
            <p class="text-muted-foreground flex-auto flex space-x-4">
                {{$news->getExcerpt()}}
            </p>
        </div>
        <div class="flex justify-between">
            <div class="flex">
                <img src="{{$news->source->getIconUrl()}}" alt="{{$news->source->name}}" class="h-5 w-5 mr-2">
                <p class="text-sm text-muted-foreground">
                    {{$news->source->name}}
                </p>
            </div>
            <p class="text-sm text-muted-foreground">{{$news->published_at_for_humans}}</p>
        </div>
    </div>
</div>