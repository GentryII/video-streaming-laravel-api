<?php

/**
 * Created by PhpStorm.
 * User: Junii
 * Date: 8/18/2017
 * Time: 2:50 AM
 */
use App\Sermon;
class AllComposer
{
    public function __construct()
    {
        $count = Sermon::count();
        $error = "Passwords do not match";
    }

    public function compose(View $view)
    {
        $view->with('counter', end($this->count));
    }
}