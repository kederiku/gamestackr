<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Source;
//use App\Models\Language;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Source::create([
            'id' => 1,
            'name' => 'jeuxvideo.com',
            'link' => 'https://www.jeuxvideo.com',
            'link_rss' => 'https://www.jeuxvideo.com/rss/rss.xml',
            'icon' => 'https://www.jeuxvideo.com/favicon.png',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 2,
            'name' => 'gamekult.com',
            'link' => 'https://www.gamekult.com',
            'link_rss' => 'https://www.gamekult.com/feed.xml',
            'icon' => 'https://cdn.gamekult.com/assets/front/img/icons/chrome/192x192.png',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 3,
            'name' => 'jeuxactu.com',
            'link' => 'https://www.jeuxactu.com',
            'link_rss' => 'https://www.jeuxactu.com/rss/news.rss',
            'icon' => 'https://i.jeuxactus.com/images/site/favicon.svg',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 4,
            'name' => 'gameblog.fr',
            'link' => 'https://www.gameblog.fr',
            'link_rss' => 'https://www.gameblog.fr/rssmap/rss_all.xml',
            'icon' => 'https://assets-prod.gameblog.fr/assets/images/icons/favicon-196x196.png',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 5,
            'name' => 'jeuxvideo-live.com',
            'link' => 'https://www.jeuxvideo-live.com',
            'link_rss' => 'https://www.jeuxvideo-live.com/feed',
            'icon' => 'https://www.jeuxvideo-live.com/wp-content/themes/jeux/jvl/assets/images/favicon-32.png',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 6,
            'name' => 'IGN France',
            'link' => 'https://fr.ign.com',
            'link_rss' => 'https://fr.ign.com/feed.xml',
            'icon' => 'https://fr.ign.com/s/ign/favicon.ico',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 7,
            'name' => 'actugaming.net',
            'link' => 'https://www.actugaming.net',
            'link_rss' => 'https://www.actugaming.net/feed/',
            'icon' => 'https://www.actugaming.net/wp-content/themes/actugaming/dist/img/layout/logo-dv.svg',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 8,
            'name' => 'gamergen.com',
            'link' => 'https://gamergen.com',
            'link_rss' => 'https://gamergen.com/rss',
            'icon' => 'https://static.gamergen.com/img/favicon.ico',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 9,
            'name' => 'indiemag.fr',
            'link' => 'https://www.indiemag.fr',
            'link_rss' => 'https://www.indiemag.fr/feed/rss.xml',
            'icon' => 'https://www.indiemag.fr/sites/all/themes/im_v4/img/logo/Logo_Carlo.png',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 10,
            'name' => 'gamalive.com',
            'link' => 'https://www.gamalive.com',
            'link_rss' => 'https://www.gamalive.com/rss.xml',
            'icon' => 'https://www.gamalive.com/favicon.ico',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 11,
            'name' => 'generation-game.com',
            'link' => 'https://www.generation-game.com',
            'link_rss' => 'https://www.generation-game.com/feed/',
            'icon' => 'https://www.generation-game.com/wp-content/uploads/2016/03/cropped-new-generation-game-1-32x32.png',
            'language_id' => 1, // FR
            'is_activated' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 12,
            'name' => 'consolefun.fr',
            'link' => 'http://consolefun.fr',
            'link_rss' => 'https://consolefun.fr/rss/rss.php',
            'icon' => 'https://consolefun.fr/favicon.ico',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 13,
            'name' => 'jeuxvideo.fr',
            'link' => 'https://www.jeuxvideo.fr',
            'link_rss' => 'https://www.jeuxvideo.fr/feed/rss',
            'icon' => 'https://www.jeuxvideo.fr/favicon-32x32.png',
            'language_id' => 1, // FR
            'is_activated' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 14,
            'name' => 'jeuxonline.info',
            'link' => 'https://www.jeuxonline.info/',
            'link_rss' => 'https://www.jeuxonline.info/rss/actualites/rss.xml',
            'icon' => 'https://jolstatic.fr/www/img/favicons/favicon.ico',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 15,
            'name' => 'eclypsia.com',
            'link' => 'https://www.eclypsia.com',
            'link_rss' => 'https://www.eclypsia.com/feed',
            'icon' => 'https://www.eclypsia.com/wp-content/themes/jeux/eclypsia/assets/images/favicon.ico',
            'language_id' => 1, // FR
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 16,
            'name' => 'IGN',
            'link' => 'https://ign.com',
            'link_rss' => 'https://feeds.feedburner.com/ign/games-all',
            'icon' => 'https://kraken.ignimgs.com/favicon.ico',
            'language_id' => 2, // EN
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 17,
            'name' => 'IGN España',
            'link' => 'https://es.ign.com',
            'link_rss' => 'https://es.ign.com/feed.xml',
            'icon' => 'https://es.ign.com/s/ign/favicon.ico',
            'language_id' => 3, // ES
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 18,
            'name' => 'eurogamer.es',
            'link' => 'https://www.eurogamer.es',
            'link_rss' => 'https://www.eurogamer.es/feed',
            'icon' => 'https://www.eurogamer.net/static/823721ada42f34bd3b53a35acc60c2f4/icon/favicon.ico',
            'language_id' => 3, // ES
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Source::create([
            'id' => 19,
            'name' => 'eurogamer.net',
            'link' => 'https://www.eurogamer.net',
            'link_rss' => 'https://www.eurogamer.net/feed',
            'icon' => 'https://www.eurogamer.net/static/823721ada42f34bd3b53a35acc60c2f4/icon/favicon.ico',
            'language_id' => 2, // EN
            'is_activated' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
       
    }
}
#http://atlasflux.saynete.net/atlas_des_flux_rss_fra_informatique_jeuvideo.htm