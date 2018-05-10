<?php

namespace App;

//use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    protected $fillable = ['title', 'verse', 'category', 'audio', 'church', 'description'];
}
