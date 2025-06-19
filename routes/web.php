<?php

use App\Http\Controllers\News\{CreateNews, PersonalNews, UpdateNews};
use App\Http\Controllers\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');
Route::get('/create',CreateNews::class)->name('news.create');
Route::get('/personal-news',PersonalNews::class)->name('news.personal');
Route::get('/news/{news}/update', UpdateNews::class)->name('news.update');