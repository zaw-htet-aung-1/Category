<?php

use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    $name = 'TMH';
    $age = 20;

    return view('pages.home', compact('name', 'age'));
});
