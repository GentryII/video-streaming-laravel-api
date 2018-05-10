<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $fillable = ['church', 'location', 'logo', 'route'];
}
