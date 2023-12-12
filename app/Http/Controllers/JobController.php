<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::select('id', 'name')->get();
        $jobs = Job::select('id', 'position', 'location', 'industry', 'job_type', 'experience_level', 'company_id', 'created_at')->filter()->paginate(10);
        return view('jobs.index', compact('jobs', 'companies'));
    }

    public function new()
    {
        $companies = Company::select('id', 'name')->get();
        return view('jobs.new', compact('companies'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'experience_level' => 'required|string|max:255',
            'company_id' => ['required', 'numeric', 'min:0'],
        ]);

        $job = Job::create($request->all());

        $job->save();
        return redirect('/jobs')->with('success', 'Job created successfully');
    }

    public function edit(Job $job)
    {
        $companies = Company::select('id', 'name')->get();
        return view('jobs.edit', compact('job', 'companies'));
    }

    public function update(Job $job, Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'job_type' => 'required|string|max:255',
            'experience_level' => 'required|string|max:255',
            'company_id' => ['required', 'numeric', 'min:0'],
        ]);

        $job->update($request->all());

        return redirect('/jobs')->with('warning', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs')->with('danger', "Job deleted successfully");
    }

    public function users(Job $job)
    {
        return view('jobs.users', compact('job'));
    }

    public function apply(Job $job)
    {
        $user = User::find(auth()->user()->id);

        if ($user->applied_jobs->contains($job)) {
            return redirect()->back()->with('danger', 'You have already applied to this job.');
        }

        $user->applied_jobs()->attach($job);

        return redirect()->back()->with('success', 'You have successfully applied to this job.');
    }
}
