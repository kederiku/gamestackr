<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'alpha2',
        'name',
        'name_locale',
    ];

    protected $hidden = ['created_at', 'updated_at'];
 
    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}