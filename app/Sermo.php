<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermo extends Model
{
    protected $fillable = ['title', 'album', 'artist', 'genre', 'source', 'image', 'trackNumber', 'totalTrackCount', 'duration', 'site'];
}
