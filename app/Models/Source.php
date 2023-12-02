<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'link_rss',
        'logo',
        'icon',
        'language_id',
        'is_activated',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function getIconUrl()
    {
        $isUrl = str_contains($this->icon, 'http');

        return ($isUrl) ? $this->icon : Storage::disk('public')->url($this->icon);
    }
    
    public function getLogoUrl()
    {
        if (empty($this->logo)) {
            return $this->getIconUrl();
        }
        $isUrl = str_contains($this->logo, 'http');

        return ($isUrl) ? $this->logo : Storage::disk('public')->url($this->logo);
    }

    public function actualities()
    {
        return $this->hasMany(News::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
