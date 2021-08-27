@extends('admin.layouts.main')
@section('title', 'Initial Installation')
@section('content')
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    OLAINDEX
                </div>
                <h2 class="page-title">
                    Initial Installation
                </h2>
            </div>
        </div>
    </div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Apply</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('apply') }}" method="get" target="_blank">
                        <div class="form-group mb-3">
                            <label class="form-label" for="redirectUri">redirect_uri </label>
                            <input type="text" class="form-control" id="redirectUri" name="redirectUri"
                                   value="{{ trim(config('app.url'),'/').'/callback' }}">
                            <span
                                class="form-hint text-danger">If already applied, please fill in the configuration directly below.<b>Note: This application process only supports the international version of OneDrive, the CenturyLink version requires a separate application.</b></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Note</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Initial Configuration</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label" for="redirectUri">redirect_uri </label>
                            <input type="text" class="form-control" id="redirectUri" name="redirectUri"
                                   value="{{ trim(config('app.url'),'/').'/callback' }}">
                            <span class="form-hint text-danger">Ensure that the callback address format is of this form http(s)://you.domain/callback.</span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="clientId"><b>client_id</b></label>
                            <input type="text" class="form-control" id="clientId" name="clientId">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="clientSecret"><b>client_secret</b></label>
                            <input type="text" class="form-control" id="clientSecret" name="clientSecret">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="accountType">Account Type</label>
                            <div>
                                <select class="form-select" name="accountType" id="accountType">
                                    <option value="">Choose Account Type</option>
                                    <option value="COM" selected>International</option>
                                    <option value="CN">China</option>
                                </select>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
