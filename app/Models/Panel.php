<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'room',
        'gdrive_link',
        'zoom_link',
        'meeting_id',
        'passcode',
        'moderator',
        'type',
    ];
}
