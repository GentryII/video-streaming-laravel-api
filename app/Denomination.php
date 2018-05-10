<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
    protected $fillable = ['church_name', 'location', 'logo', 'route'];
}
