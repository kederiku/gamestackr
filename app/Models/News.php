<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_id',
        'title',
        'link',
        'image',
        'description',
        'published_at',
    ];

    protected $hidden = ['source_id', 'created_at', 'updated_at'];
    protected $appends = ['published_at_for_humans'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getExcerpt()
    {
        if(strlen($this->description) > 500){
            return Str::limit(strip_tags($this->description), 500);
        }
        else{
            return $this->description;
        }
    }

    public function getPublishedAtForHumansAttribute()
    {
        return $this->published_at->diffForHumans();
    }

    public function scopeWhereLanguage($query, string $lang)
    {
        
        $query->whereHas('source', function ($query) use ($lang) {
            $lang = explode('_', $lang)[0];
            $query->with('language')
                ->join('languages', 'languages.id', '=', 'sources.language_id')
                ->where('languages.alpha2', $lang);
        });
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }
}
