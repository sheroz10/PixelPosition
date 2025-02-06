<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $job = Job::all()
        ->groupBy('featured') ;

        return view("job.index" , [
            'featured_jobs' => $job[0] ,
            'jobs'=> $job[1] ,
            'tags' => Tag::all(),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $attributes =  $request->validate([ 
            'title' =>  ['required'],
            'salary' => ['required'],
            'location' =>  ['required'],
            'schedule' => ['required' , Rule::in(['Full Time' ,'Part Time' ]) ],
            'url' =>  ['required' ,'active_url'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('feature') ; 
        // dd(Arr::except($attributes ,'tags'));
        // dd(Auth::user()->employer->job());
        $job = Auth::user()->employer->job()->create(Arr::except($attributes ,'tags'));

        if($attributes['tags'] ?? false)
        {
            foreach(explode(',' , $attributes['tags']) as $tag)
            {
                $job->tag($tag);
            }
        }

        return Redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
