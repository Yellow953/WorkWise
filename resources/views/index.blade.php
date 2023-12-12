@extends('layouts.app')

@section('content')
<div id="page-inner">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2>Home</h2>
            <h5>Welcome to WorkWise, your one stop to find your dream job...</h5>
        </div>
        <div>
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn btn btn-primary mx-1">Filter</button>
                <div id="myDropdown" class="dropdown-content">
                    <form action="/" method="get">
                        <h3>Filter Jobs</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_id" class="form-label">Company</label>
                                    <select name="company_id" class="form-control">
                                        <option value="" selected></option>
                                        @foreach ($companies as $company)
                                        <option value="{{$company->id}}" {{request()->
                                            query('company_id')==$company->id ? 'selected' : ''}}>
                                            {{$company->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" name="position" class="form-control" placeholder="Position"
                                        value="{{request()->query('position')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industry" class="form-label">Industry</label>
                                    <input type="text" name="industry" class="form-control" placeholder="Industry"
                                        value="{{request()->query('industry')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" name="location" class="form-control" placeholder="Position"
                                        value="{{request()->query('location')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_type" class="form-label">Job Type</label>
                                    <select name="job_type" class="form-control">
                                        <option value="" selected></option>
                                        <option value="software_engineer">Software Engineer</option>
                                        <option value="web_developer">Web Developer</option>
                                        <option value="data_scientist">Data Scientist</option>
                                        <option value="network_administrator">Network Administrator</option>
                                        <option value="business_analyst">Business Analyst</option>
                                        <option value="project_manager">Project Manager</option>
                                        <option value="marketing_manager">Marketing Manager</option>
                                        <option value="financial_analyst">Financial Analyst</option>
                                        <option value="human_resources_manager">Human Resources Manager</option>
                                        <option value="customer_support_representative">Customer Support
                                            Representative</option>
                                        <option value="sales_representative">Sales Representative</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="nurse">Nurse</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="police_officer">Police Officer</option>
                                        <option value="firefighter">Firefighter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="experiecne_level" class="form-label">Experience Level</label>
                                    <select name="experiecne_level" class="form-control">
                                        <option value="" selected></option>
                                        <option value="training" {{request()->query('experiecne_level')=='training'
                                            ? 'selected' : ''}}>Training</option>
                                        <option value="junior" {{request()->query('experiecne_level')=='junior' ?
                                            'selected' : ''}}>Junior</option>
                                        <option value="senior" {{request()->query('experiecne_level')=='senior' ?
                                            'selected' : ''}}>Senior</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <ul class="col-12 px-4" id="job-list">
            @forelse ($jobs as $job)
            <li class="job-card new featured my-4">
                <div class="job-card__info">
                    <div class="d-flex align-items-center">
                        <div class="img-c"><img src="{{ asset('assets/img/job.png') }}" />
                        </div>
                        <div>
                            <div class="d-flex align-items-center">
                                <p class="p-0">{{ ucwords($job->company->name) }}</p>
                            </div>
                            <a href="javascript:void(0)">
                                <h6>{{ ucwords($job->position) }}</h6>
                            </a>
                            <ul>
                                <li>{{ $job->created_at->diffForHumans() }}</li>
                                <li>{{ ucwords($job->job_type) }}</li>
                                <li>{{ ucwords($job->experience_level) }}</li>
                                <li>{{ ucwords($job->location) }}</li>
                                <li>{{ ucwords($job->industry) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="job-card__tags">
                    <li><a href="/jobs/{{ $job->id }}/apply" class="btn btn-primary">Apply</a></li>
                </ul>
            </li>
            @empty
            No Jobs Yet
            @endforelse
        </ul>
    </div>
</div>
@endsection