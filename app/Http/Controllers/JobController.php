<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = Job::select('id', 'position', 'requirements', 'company_id', 'created_at')->filter()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function new()
    {
        return view('jobs.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'requirements' => 'required|string|max:255',
            'company_id' => ['required', 'number', 'min:0'],
        ]);

        $job = Job::create($request->all());

        $job->save();
        return redirect('/jobs')->with('success', 'Job created successfully');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Job $job, Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'requirements' => 'required|string|max:255',
            'company_id' => ['required', 'number', 'min:0'],
        ]);

        $job->update($request->all());

        return redirect('/jobs')->with('warning', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs')->with('danger', "Job deleted successfully");
    }
}
