<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index(){
        $jobs= Job::with('employer')->latest()->simplePaginate(5);
        return view('Jobs.index', ['jobs' => $jobs ]); // or Jobs/index
    }

    public function create() {
        return view('Jobs.create');
    }

    public function show(Job $job){
        return view('Jobs.show',['job' => $job]);
    }

    public function store(){
        //validation skiped for some time
    //now implemented
        request()->validate([
            'title' => ['required','min:3'],
            'salary' => ['required']
        ]);
        //hardcoded employer_id for some time
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 
        ]);

        Mail::to($job->employer->user)->queue(new JobPosted($job));
        
        return redirect('/jobs');
    }

    public function edit(Job $job){
        
        //if(Auth::guest()){
          //  return redirect('/session');
       // }
       
        //if($job->employer->user->isNot(Auth::user())){
         //   abort(403);
        //} or use gate by first define it in app service provider

        //Gate::authorize('edit-job',$job); // there is gate allow and denied using which you can handle it if not then using authorize laravel will handle it
        return view('Jobs.edit',['job' => $job]); 
    }
    public function update(Job $job){
        //validate
    request()->validate([
        'title' => ['required','min:3'],
        'salary' => ['required']
    ]);
    //authorize (on hold)

    //update the job
    //$job = Job::findOrFail($id);
    /*
    $job->title = request('title');
    $job->salary = request('salary');
    $job->save();
    or

    */
    $job->update([
        'title'=> request('title'),
        'salary' => request('salary')
    ]);
    //and persist

    //redirect to jobs page.
    
    return redirect('/jobs/'.$job->id);

        
    }
    public function destroy(Job $job){
        //authorize (On hold)..

    //delete the  job
    $job->delete(); //inlined 
    
    //redirect
    return redirect('/jobs');

    }
}
