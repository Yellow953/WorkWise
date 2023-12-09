@extends('layouts.app')

@section('content')

<div class="row px-4">
    <div class="col-md-12 my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Jobs</h2>

            <div class="links d-flex align-items-center">
                <a href="/jobs/new" class="btn btn-primary mx-1">New Job</a>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn btn btn-primary mx-1">Filter</button>
                    <div id="myDropdown" class="dropdown-content">
                        <form action="/jobs" method="get">
                            <h3>Filter Jobs</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_id" class="form-label">Company</label>
                                        <select name="company_id" class="form-control">
                                            <option value="" selected></option>
                                            @foreach ($companies as $company)
                                            <option value="{{$compant->id}}" {{request()->query('company_id')==$company->id ? 'selected' : ''}}>
                                                {{$company->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position" class="form-label">Position</label>
                                        <input type="text" name="position" class="form-control" placeholder="Position" value="{{request()->query('position')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="industry" class="form-label">Industry</label>
                                        <input type="text" name="industry" class="form-control" placeholder="Industry" value="{{request()->query('industry')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" name="location" class="form-control" placeholder="Position" value="{{request()->query('location')}}">
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
                                            <option value="customer_support_representative">Customer Support Representative</option>
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
                                            <option value="training" {{request()->query('experiecne_level')=='training' ? 'selected' : ''}}>Training</option>    
                                            <option value="junior" {{request()->query('experiecne_level')=='junior' ? 'selected' : ''}}>Junior</option>
                                            <option value="senior" {{request()->query('experiecne_level')=='senior' ? 'selected' : ''}}>Senior</option>
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
    </div>
    <hr />

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover m-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Location</th>
                            <th>Industry</th>
                            <th>Job Type</th>
                            <th>Experience Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                        <tr>
                            <td>{{ ucwords($job->company->name) }}</td>
                            <td>{{ ucwords($job->position) }}</td>
                            <td>{{ ucwords($job->location) }}</td>
                            <td>{{ ucwords($job->industry) }}</td>
                            <td>{{ ucwords($job->job_type) }}</td>
                            <td>{{ ucwords($job->experience_level) }}</td>
                            <td>
                                <div class="btn-container">
                                    <a href="/jobs/{{ $job->id }}/edit" class="btn btn-warning btn-rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <a href="/jobs/{{ $job->id }}/destroy" class="btn btn-danger btn-rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                No Jobs Yet...
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination m-0">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection