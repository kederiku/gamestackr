<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'alpha2',
        'name',
        'name_locale',
        'region',
        'flag',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function getFlagUrl()
    {
        $isUrl = str_contains($this->flag, 'http');

        return ($isUrl) ? $this->flag : Storage::disk('public')->url($this->flag);
    }
}