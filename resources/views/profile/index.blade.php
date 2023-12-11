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
                    <h3>Edit Profile</h3>
                    <a href="#">View Details </a>

                </div>

            </div>
        </div>
        <div class="password animated zoomIn">
            <div class="avatar">

                <div class="bubble">
                    <h3>Password</h3>
                    <a href="#">View Details </a>

                </div>

            </div>
        </div>
        <div class="applied_jobs animated zoomIn">
            <div class="avatar">

                <div class="bubble">
                    <h3>Appplied Jobs</h3>
                    <a href="#">View Details </a>

                </div>

            </div>
        </div>
    </div>
    <!--End Content-->
    <div class="footer">
        <a href="http://www.arjunamgain.com.np/" target="_blank"><i class="fa fa-link"></i><span>Website</span></a>
        <a href="https://codepen.io/arjunamgain/" target="_blank"><i class="fa fa-codepen"></i><span>My Pen</span></a>
        <a href="https://twitter.com/arjunamgain" target="_blank"><i class="fa fa-twitter"></i><span>Follow</span></a>
        <a href="mailto:mr.arjunamgain@gmail.com" target="_blank"><i class="fa fa-briefcase"></i><span>Hire
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