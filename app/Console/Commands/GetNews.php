<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\News;
use App\Models\Source;

class GetNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $sources = Source::where("is_activated", 1)->get();
        foreach($sources as $source){
            $link_array = [];
            $this->info("\n Source: ". $source->link_rss);
            $news = News::where("source_id", $source->id)    
                ->latest()->take(100)->get('link');
            foreach($news as $n)
            {
                $link_array[] = $n->link;
            }
            try {
                $rss = simplexml_load_file($source->link_rss);
            } catch (\Exception $e) {
                $this->info("Error: ". $e->getMessage());
                continue;
            }
            $rss = simplexml_load_file($source->link_rss);

            foreach ($rss->channel->item as $item)
            {   
                $title = $item->title;
                $link = $item->link;
                $description = html_entity_decode(strip_tags($item->description));
                $published_at = $item->pubDate;
                if (empty($published_at)) {
                    $dc = $item->children('http://purl.org/dc/elements/1.1/');
                    $published_at = $dc->date;
                }
                $timestamp = strtotime($published_at);
                $image = $item->enclosure['url'];
                if (empty($image)) {
                    $image = null;
                    $media = $item->children('http://search.yahoo.com/mrss/');
                    if (!empty($media)) {
                        $image = $media->content->attributes()['url'];
                    }
                }
                $source_id = $source->id;
                
                if (!array_search($link, $link_array)) {
                    News::firstOrCreate(
                        ['link' => $link],
                        [
                            'title' => $title,
                            'link' => $link,
                            'description' => $description,
                            'published_at' => date('Y-m-d H:i:s', $timestamp),
                            'image' => $image,
                            'source_id' => $source_id,
                        ]
                    );
                    $this->info($source->name . ": " . $title);
                }
            }
            
        
        }
    }
}

