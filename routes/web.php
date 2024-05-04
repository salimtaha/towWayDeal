<?php

use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dd', function () {
    $today_date =  Carbon::parse(Carbon::today());

    $events = Event::all();
    foreach ($events as $event) {
        $start_date = Carbon::parse($event->start);

        if ($start_date->equalTo($today_date)) {
            return "ff";
        }

        // return $start_date;
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
