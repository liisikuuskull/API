<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TopicController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies', [MovieController::class, 'index']);

Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('/create', [TopicController::class, 'create'])->name('topics.create');
Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');

Route::get('/topics/output/{limit?}', 'TopicController@outputTopics')->name('topics.output');



