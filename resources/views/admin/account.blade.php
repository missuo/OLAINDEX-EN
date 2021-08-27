@extends('admin.layouts.main')
@section('title', 'Account Manager')
@section('content')
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    {{ $account->remark }}
                </div>
                <h2 class="page-title">
                Account Manager
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="{{ route('admin.account.list') }}" class="btn btn-white">
                      Manage Account
                    </a>
                  </span>
                    <a href="{{ route('install') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Bind Account
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                       data-bs-target="#modal-report" aria-label="Create new report">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Account Settings</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf

                        <div class="form-group mb-3 ">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="open_sp"
                                       @if( $config['open_sp'] ?? 0) checked
                                       @endif onchange="$('input[name=\'config[open_sp]\']').val(Number(this.checked))">
                                <span class="form-check-label">Enable SharePoint mounts</span>
                                <input type="hidden" name="config[open_sp]"
                                       value="{{ $config['open_sp'] ?? 0 }}">
                            </label>
                            <span class="form-hint text-danger">Enable SharePoint mount will switch the use to SharePoint</span>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="sp">SharePoint Address</label>
                            <div>
                                <input type="text" class="form-control" id="sp" name="config[sp]"
                                       value="{{ $config['sp'] ?? ''}}">
                                <span class="form-hint text-danger">site_id:{{ $config['sp_id'] ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="root">Starting Index Directory</label>
                            <div>
                                <input type="text" class="form-control" id="root" name="config[root]"
                                       value="{{ array_get($config, 'root', '') }}">
                                <span class="form-hint text-danger">Index start directory, modify to sharepoint need to pay attention to this setting</span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="image_path">Image Hosting Address</label>
                            <div>
                                <input type="text" class="form-control" id="image_path" name="config[image_path]"
                                       value="{{ array_get($config, 'image_path', '/') }}">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="encrypt_path">Encryption Path</label>
                            <textarea class="form-control" id="encrypt_path" name="config[encrypt_path]"
                                      rows="3">{{ array_get($config, 'encrypt_path', '') }}</textarea>
                            <span
                                class="form-hint text-danger">Encrypted files and folders require password access, in the form of "directory:password", separated by "|" and separated by an English symbol (including priority)</span>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="hide_path">Hide Path</label>
                            <textarea class="form-control" id="hide_path" name="config[hide_path]"
                                      rows="3">{{ array_get($config, 'hide_path', '') }}</textarea>
                            <span class="form-hint text-danger">Marked files and folders are not displayed in the foreground and are separated by "|", the separator is an English symbol</span>
                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label" for="list_limit">Number Of List Displays</label>
                            <div>
                                <input type="text" class="form-control" id="list_limit" name="config[list_limit]"
                                       value="{{ array_get($config, 'list_limit', 10) }}">
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
