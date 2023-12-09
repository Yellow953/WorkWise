@extends('layouts.app')

@section('content')

<div class="row px-4">
    <div class="col-md-12 my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Companies</h2>

            <div class="links d-flex align-items-center">
                <a href="/companies/new" class="btn btn-primary mx-1">New Company</a>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn btn btn-primary mx-1">Filter</button>
                    <div id="myDropdown" class="dropdown-content">
                        <form action="/companies" method="get">
                            <h3>Filter Companies</h3>
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{request()->query('name')}}">
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{request()->query('email')}}">
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone"
                                    value="{{request()->query('phone')}}">
                            </div>

                            <div class="form-group">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" name="website" class="form-control" placeholder="Website"
                                    value="{{request()->query('website')}}">
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                        <tr>
                            <td>{{ ucwords($company->name) }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>
                                <a href="{{ $company->website }}" target="blank" class="btn btn-info">Visit site</a>
                            </td>
                            <td>
                                <div class="btn-container">
                                    <a href="/companies/{{ $company->id }}/edit" class="btn btn-warning btn-rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <a href="/companies/{{ $company->id }}/destroy" class="btn btn-danger btn-rounded">
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
                            <td colspan="5">
                                No Companies Yet...
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination m-0">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection