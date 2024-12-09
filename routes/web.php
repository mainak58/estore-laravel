<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


Route::get('jobs', function () {

    $jobs = Job::with('employer')->latest()->paginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);    
});

Route::get('/jobs/create', function () {

    return view('jobs.create');
});


Route::get('/jobs/{id}', function ($id) {

    $jobs = Job::find($id);

    return view('jobs.show', ['job' => $jobs]);
});


Route::post('/jobs' , function() {

    request()->validate([
        'title' => 'required',
        'description' => 'required'
    ]);

    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/service', function () {
    return view('service');
});

// edit
Route::get('/jobs/{id}/edit', function ($id) {

    $jobs = Job::find($id);

    return view('jobs.edit', ['job' => $jobs]);
});


// update using patch

Route::patch('/jobs/{id}' , function ($id){

    request()->validate([
        'title'=> ['required'],
        'description'=> ['required']
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title'=>request('title'),
        'description' =>request('description')
    ]);

    return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully!');
});

// delete
Route::delete('/jobs/{id}' , function($id){
    Job::findOrFail($id)->delete();
    return redirect('/jobs');
});

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [SessionController::class, 'create']);


Route::get('/test' , function(){

    dispatch(function() {
        logger('hello from queeue');
    });
    return 'Done';
});

Route::get('/test2' , function(){

    Mail::to('test@example.com')->send(new JobPosted);
    return new JobPosted;
});
