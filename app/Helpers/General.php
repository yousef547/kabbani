<?php

use Illuminate\Support\Facades\Config;

function get_default_language()
{
    return Config::get('app.locale');
}

function uploadImage($folder , $image)
{
    $image = $image->store('/' , $folder);
    // $fileName=$image->hashName();
    $path = 'kabbani/assets/images/'. $folder . '/' . $image;
    return $path;
}
