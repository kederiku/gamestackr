<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Game extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public array $translatable = [
        'name',
        'slug',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
    ];

    public function getImageUrl(){
        $isUrl = str_contains($this->image, 'http');
        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }

}
