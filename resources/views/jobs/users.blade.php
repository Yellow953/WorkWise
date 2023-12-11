@extends('layouts.app')

@section('content')
<div id="page-inner">
    <a href="/jobs" class="btn btn-default">Back</a>

    <div class="row">
        <div class="col-md-12">
            <h2>Applied Users</h2>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body m-4">
                    @forelse ($job->applied_users as $user)
                    <div class="row">
                        <div class="col-md-4">
                            {{ ucwords($user->name) }}
                        </div>
                        <div class="col-md-4">
                            {{ $user->email }}
                        </div>
                        <div class="col-md-4">
                            <a href="/users/{{ $user->id }}/download_cv" class="btn btn-primary">Download CV</a>
                        </div>
                    </div>
                    @empty
                    No Users applied to this Job Yet...
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End Form Elements -->
    </div>
</div>
<!-- /. PAGE INNER  -->
@endsection