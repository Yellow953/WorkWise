@extends('layouts.app')

@section('content')
<div id="page-inner">
    <a href="/jobs" class="btn btn-default">Back</a>

    <div class="row">
        <div class="col-md-12">
            <h2>Edit Job</h2>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body m-4">
                    <form action="/jobs/{{ $job->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company*</label>
                                    <select class="form-control" name="company_id">
                                        @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" {{ $job->company_id == $company->id ?
                                            'selected' : '' }}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Position*</label>
                                    <input type="text" class="form-control" name="position" value="{{ $job->position }}"
                                        required placeholder="Position..." />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location*</label>
                                    <input type="text" class="form-control" name="location" value="{{ $job->location }}"
                                        placeholder="Location..." required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Industry*</label>
                                    <input type="text" class="form-control" name="industry" value="{{ $job->industry }}"
                                        placeholder="Industry..." required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Type</label>
                                    <select class="form-control" name="job_type">
                                        <option value="software_engineer">Software Engineer</option>
                                        <option value="web_developer">Web Developer</option>
                                        <option value="data_scientist">Data Scientist</option>
                                        <option value="business_analyst">Business Analyst</option>
                                        <option value="marketing_manager">Marketing Manager</option>
                                        <option value="financial_analyst">Financial Analyst</option>
                                        <option value="human_resources_manager">Human Resources Manager</option>
                                        <option value="sales_representative">Sales Representative</option>
                                        <option value="nurse">Nurse</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="police_officer">Police Officer</option>
                                        <option value="firefighter">Firefighter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Experience Level</label>
                                    <select class="form-control" name="experience_level">
                                        <option value="training" {{$job->experiecne_level=='training' ? 'selected' : ''
                                            }}>Training</option>
                                        <option value="junior" {{$job->experiecne_level=='junior' ? 'selected' : '' }}>
                                            Junior</option>
                                        <option value="senior" {{$job->experiecne_level=='senior' ? 'selected' : '' }}>
                                            Senior</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection