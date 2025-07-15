<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'theme',
        'theme_color',
        'host',
        'url',
        'date',
        'date_description',
        'year',
        'register_link',
        'template_link',
        'introduction',
        'introduction_link',
        'chairman_picture',
        'chairman_name',
        'logo',
        'logo_alt',
        'logo_icon',
        'venue',
        'venue_address',
        'location_map',
        'about',
        'contact',
        'office_address',
        'email',
        'phone',
        'youtube',
        'youtube_stream',
    ];
}
