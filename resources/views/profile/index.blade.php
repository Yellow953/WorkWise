@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="right-menu">
        <a class="active" href="#profile"><i class="fa fa-user"></i><span>Profile</span></a>
        <a href="#edit"><i class="fa fa-edit"></i><span>Edit</span></a>
        <a href="#password"><i class="fa fa-edit"></i><span>Password</span></a>
        <a href="#applied_jobs"><i class="fa fa-folder"></i><span>Applied Jobs</span></a>
    </div>
    <div class="content">
        <div class="profile open animated zoomIn">
            <div class="avatar">
                <img src="{{ asset('assets/img/find_user.png') }}">
                <div class="bubble">
                    <h3>{{ ucwords($user->name) }}</h3>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </div>

            </div>
        </div>
        <div class="edit animated zoomIn">
            <div class="avatar">
                <div class="bubble">
                    <h3 class="text-bold">Edit Profile</h3>
                    <form action="/profile/update" method="POST" enctype="multipart/form-data" class="text-left">
                        @csrf
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required />
                        </div>
                        <div class="form-group">
                            <label>Phone Number*</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" required />
                        </div>
                        <div class="form-group">
                            <label>CV</label>
                            <input type="file" class="form-control" name="cv" value="{{ $user->cv }}" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="password animated zoomIn">
            <div class="avatar">

                <div class="bubble">
                    <h3>Change Password</h3>
                    <form action="/profile/save_password" method="POST" enctype="multipart/form-data" class="text-left">
                        @csrf
                        <div class="form-group">
                            <label>Current Password*</label>
                            <input type="password" class="form-control" name="current_password" required />
                        </div>
                        <div class="form-group">
                            <label>New Password*</label>
                            <input type="password" class="form-control" name="new_password" required />
                        </div>
                        <div class="form-group">
                            <label>Confirm Password*</label>
                            <input type="password" class="form-control" name="new_password_conformation" required />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="applied_jobs animated zoomIn">
            <div class="avatar">
                <div class="bubble">
                    <h3>Appplied Jobs</h3>

                    @forelse ($user->applied_jobs as $aj)
                    <div class="card">
                        Company: {{ $aj->company->name }} <br>
                        Position: {{ $aj->position }} <br>
                        Location: {{ $aj->location }} <br>
                        Industry: {{ $aj->industry }} <br>
                        Job Type: {{ $aj->job_type }} <br>
                        Experience Level: {{ $aj->experience_level }} <br>
                    </div>
                    @empty
                    No Applied Jobs Yet ...
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!--End Content-->
    <div class="footer">
        <a href="tel::{{ $user->phone }}" target="_blank"><i class="fa fa-phone"></i><span>Phone</span></a>
        <a href="mailto:{{ $user->email }}" target="_blank"><i class="fa fa-briefcase"></i><span>Email
                me</span></a>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function () {
 $('.right-menu a').click(function(){
 	 $(this).siblings().removeClass('active');
		$(this).addClass('active');
	var tab = $(this).attr('href').replace('#','.');
	$('.content>div').removeClass('open');
	$(tab).addClass('open');
 }); 
});
</script>
@endsection