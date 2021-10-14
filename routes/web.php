<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/createWorker', function () {
    return view('createWorker');
})->name('createWorker');

Route::get('/createLesson', function () {
    return view('createLesson');
})->name('createLesson');

Route::get('/createTimeTableDay', function () {
    return view('createTimeTableDay');
})->name('createTimeTableDay');

Route::get('/task1', function () {
    return view('task1');
})->name('task1');

Route::get('/task2', function () {
    return view('task2');
})->name('task2');

Route::get('/task3', function () {
    return view('task3');
})->name('task3');


Route::post('/createWorker/submit', 'App\Http\Controllers\WorkerController@submit')
    ->name('worker-form');
Route::get('/worker/all', 'App\Http\Controllers\WorkerController@allData')
    ->name('workers-data');
Route::get('/worker/all{id}', 'App\Http\Controllers\WorkerController@showOneMessage')
    ->name('workers-data-one');
Route::get('/worker/all{id}/update', 'App\Http\Controllers\WorkerController@updateMessage')
    ->name('workers-update');
Route::post('/worker/all{id}/update', 'App\Http\Controllers\WorkerController@updateMessageSubmit')
    ->name('workers-update-submit');
Route::get('/worker/all{id}/delete', 'App\Http\Controllers\WorkerController@deleteMessage')
    ->name('workers-delete');

Route::post('/createLesson/submit', 'App\Http\Controllers\LessonController@submit')
    ->name('lesson-form');
Route::get('/lesson/all', 'App\Http\Controllers\LessonController@allData')
    ->name('lesson-data');
Route::get('/lesson/all{id}', 'App\Http\Controllers\LessonController@showOneMessage')
    ->name('lesson-data-one');
Route::get('/lesson/all{id}/update', 'App\Http\Controllers\LessonController@updateMessage')
    ->name('lesson-update');
Route::post('/lesson/all{id}/update', 'App\Http\Controllers\LessonController@updateMessageSubmit')
    ->name('lesson-update-submit');
Route::get('/lesson/all{id}/delete', 'App\Http\Controllers\LessonController@deleteMessage')
    ->name('lesson-delete');

Route::post('/createTimeTableDay/submit', 'App\Http\Controllers\TimeTableController@submit')
    ->name('timeTableDay-form');
Route::get('/TimeTable/all', 'App\Http\Controllers\TimeTableController@allData')
    ->name('timeTable-data');
Route::get('/TimeTable/all{id}', 'App\Http\Controllers\TimeTableController@showOneMessage')
    ->name('timeTableDay-data-one');
Route::get('/TimeTable/all{id}/update', 'App\Http\Controllers\TimeTableController@updateMessage')
    ->name('timeTableDay-update');
Route::post('/TimeTable/all{id}/update', 'App\Http\Controllers\TimeTableController@updateMessageSubmit')
    ->name('timeTableDay-update-submit');
Route::get('/TimeTable/all{id}/delete', 'App\Http\Controllers\TimeTableController@deleteMessage')
    ->name('timeTableDay-delete');

Route::get('/worker/resultTask1', 'App\Http\Controllers\TasksController@resultTask1')
    ->name('workers-task1');
Route::get('/worker/resultTask2', 'App\Http\Controllers\TasksController@resultTask2')
    ->name('workers-task2');
Route::get('/worker/resultTask3', 'App\Http\Controllers\TasksController@resultTask3')
    ->name('workers-task3');
