@extends('layouts.app')

@section('content')
<div id="page-inner">
    <a href="/users" class="btn btn-default">Back</a>

    <div class="row">
        <div class="col-md-12">
            <h2>Edit User</h2>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
                <div class="panel-body m-4">
                    <form action="/users/{{ $user->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number*</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}"
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email*</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required />
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
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