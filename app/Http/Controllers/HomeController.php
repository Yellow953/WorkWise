<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = Job::select('id', 'position', 'location', 'industry', 'job_type', 'experience_level', 'company_id', 'created_at')->filter()->get();
        $companies = Company::select('id', 'name')->get();

        $data = compact('jobs', 'companies');
        return view('index', $data);
    }

    public function custom_logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
