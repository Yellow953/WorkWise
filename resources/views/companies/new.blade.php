@extends('layouts.app')

@section('content')
<div id="page-inner">
    <a href="/companies" class="btn btn-default">Back</a>

    <div class="row">
        <div class="col-md-12">
            <h2>New Company</h2>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body m-4">
                    <form action="/companies/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        required placeholder="Name..." />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number*</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                        placeholder="Phone Number..." required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required
                                placeholder="Email..." />
                        </div>

                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" class="form-control" name="website" value="{{ old('website') }}" required
                                placeholder="Website..." />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Form Elements -->
    </div>
</div>
<!-- /. PAGE INNER  -->
@endsection