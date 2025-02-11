<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use Barryvdh\Debugbar\DataCollector\SessionCollector;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
/*
mail testing
*/
Route::get('/test',function ()
{
   // dispatch(function(){
    //    logger('sended from queue !');
   // })->delay(5);
   $job = Job::first();
   TranslateJob::dispatch($job);
    return 'Done';  
});
//*/
/*Route::get('/', function () {
    //$job = Job::all();
    //dd($job[1]->title); for geting single row and specific data from table
    return view('home',['msg' => 'kem party ?']);
});

Or 

*/

Route::view('/','home');
/*
Route::get('/jobs', function () {
    //$jobs= Job::with('employer')->get(); this may cause memory issue when records are more like 10000 as it return all records
    $jobs= Job::with('employer')->latest()->simplePaginate(5);
    return view('Jobs.index', ['jobs' => $jobs ]); // or Jobs/index
    });
or
*/
Route::get('/jobs',[JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create']);
Route::get('/jobs/{job}',[JobController::class,'show']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->middleware('auth')->can('edit','job'); // Or Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->middleware(['auth','can:edit-job,job']);
Route::patch('/jobs/{job}',[JobController::class,'update']);
Route::delete('/jobs/{job}',[JobController::class,'destroy']);
/*
or
group them

Route::controller(JobController::class)->group(function (){
    Route::get('/jobs','index');
Route::get('/jobs/create','create');
Route::get('/jobs/{job}','show');
Route::post('/jobs','store');
Route::get('/jobs/{job}/edit','edit');
Route::patch('/jobs/{job}','update');
Route::delete('/jobs/{job}','destroy');

});

Or
make it as resource but remeber 
if you have all then below one  outside of comment
else if only specific then

Route::resource('jobs',JobController::class,['only' => ['index','show']]);

Or 
create other than except

Route::resource('jobs',JobController::class,['except' => ['edit]]);

Route::resource('jobs',JobController::class)->middleware('auth');
*/
/*Route::get('/contact', function () {
    return view('contact');
});
*/
Route::view('/contact','contact');
//Auth
Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store']);


Route::get('/session',[SessionController::class,'create'])->name('login');
Route::post('/session',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);