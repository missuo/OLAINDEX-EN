@extends('admin.layouts.main')
@section('title', 'My Information')
@section('content')
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    My Information
                </h2>
            </div>
        </div>
    </div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Modify Information</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Username</label>
                            <div>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ auth()->user()->name }}">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="old_password">Original Password</label>
                            <div>
                                <input type="password" class="form-control" id="old_password" name="old_password">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="password">New Password</label>
                            <div>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation">
                            </div>
                        </div>


                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
