@php
    $themes = [
        'Cerulean' => 'cerulean',
        'Cosmo' => 'cosmo',
        'Cyborg' => 'cyborg',
        'Darkly' => 'darkly',
        'Flatly' => 'flatly',
        'Journal' => 'journal',
        'Litera' => 'litera',
        'Lumen' => 'lumen',
        'Materia' => 'materia',
        'Lux' => 'lux',
        'Minty' => 'minty',
        'Pulse' => 'pulse',
        'Sandstone' => 'sandstone',
        'Simplex' => 'simplex',
        'Sketchy' => 'sketchy',
        'Slate' => 'slate',
        'Solar' => 'solar',
        'Spacelab' => 'spacelab',
        'Superhero' => 'superhero',
        'United' => 'united',
        'Yeti' => 'yeti',
    ];
    $main_themes = [
        'default' => 'default',
        'mdui' => 'mdui',
    ];
@endphp
@extends('admin.layouts.main')
@section('title', 'Basic Settings')
@section('content')
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Settings
                </div>
                <h2 class="page-title">
                    Site Settings
                </h2>
            </div>
        </div>
    </div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#basic-config" class="nav-link active" data-bs-toggle="tab">Basic Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="#show-config" class="nav-link" data-bs-toggle="tab">Display Settings</a>
                    </li>
                    <li class="nav-item">
                        <a href="#image-config" class="nav-link" data-bs-toggle="tab">Image Hosting Settings</a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="basic-config">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label" for="site_name">Site Name</label>
                                    <div>
                                        <input type="text" class="form-control" id="site_name" name="site_name"
                                               value="{{ setting('site_name','OLAINDEX') }}">
                                        <small class="form-hint text-danger">Displayed Site Name.</small>
                                    </div>
                                </div>


                                <div class="form-group mb-3 ">
                                    <label class="form-label" for="main_theme">Theme</label>
                                    <div>
                                        <select class="form-select" name="main_theme" id="main_theme">
                                            @foreach( $main_themes as $name => $theme)
                                                <option value="{{ $theme }}"
                                                        @if(setting('main_theme') === $theme) selected @endif>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-3 ">
                                    <label class="form-label" for="site_theme">Secondary Theme</label>
                                    <div>
                                        <select class="form-select" name="site_theme" id="site_theme">
                                            @foreach( $themes as $name => $theme)
                                                <option value="{{ $theme }}"
                                                        @if(setting('site_theme') === $theme) selected @endif>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-hint text-danger">Effective only when display theme is set to default.</small>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="cache_expires">Cache Time For Web Resources(Seconds)</label>
                                    <div>
                                        <input type="text" class="form-control" id="cache_expires" name="cache_expires"
                                               value="{{ setting('cache_expires', 1800) }}">
                                        <small class="form-hint text-danger">It is recommended that the cache time is less than 60 minutes, otherwise it will lead to cache invalidation.</small>
                                    </div>
                                </div>

                                <div class="form-group mb-3 ">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="open_search"
                                               @if( setting('open_search',0)) checked
                                               @endif onchange="$('input[name=\'open_search\']').val(Number(this.checked))">
                                        <span class="form-check-label">Enable Directory Search</span>
                                        <input type="hidden" name="open_search"
                                               value="{{ setting('open_search', 0) }}">
                                    </label>
                                    <span class="form-hint text-danger">Directory search is only for the current directory resource search, not for global search</span>
                                </div>


                                <div class="form-group mb-3 ">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="open_short_url"
                                               @if( setting('open_short_url',0)) checked
                                               @endif onchange="$('input[name=\'open_short_url\']').val(Number(this.checked))">
                                        <span class="form-check-label">Enable Preview Short Links</span>
                                        <input type="hidden" name="open_short_url"
                                               value="{{ setting('open_short_url', 0) }}">
                                    </label>
                                    <span class="form-hint text-danger">Only short links are shown in the preview file after turning on</span>
                                </div>

                                <div class="form-group mb-3 ">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="single_account_mode"
                                               @if( setting('single_account_mode',0)) checked
                                               @endif onchange="$('input[name=\'single_account_mode\']').val(Number(this.checked))">
                                        <span class="form-check-label">Path-Compatible Mode</span>
                                        <input type="hidden" name="single_account_mode"
                                               value="{{ setting('single_account_mode', 0) }}">
                                    </label>
                                    <span class="form-hint text-danger">Access resources by path after opening</span>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="encrypt_tip">Encrypted Resource Tips</label>
                                    <textarea class="form-control" id="encrypt_tip" name="encrypt_tip"
                                              rows="1">{{ setting('encrypt_tip') }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="copyright">Footer Text</label>
                                    <textarea class="form-control" id="copyright" name="copyright"
                                              rows="3">{{ setting('copyright') }}</textarea>
                                    <span class="form-hint text-danger">Leave blank to not display. Please use MarkDown</span>
                                </div>


                                <div class="form-group mb-3">
                                    <label class="form-label" for="stats_code">Statistics Code</label>
                                    <textarea class="form-control" id="encrypt_tip" name="stats_code"
                                              rows="3">{{ setting('stats_code') }}</textarea>
                                    <span class="form-hint text-danger">Site statistics code</span>
                                </div>


                                <div class="form-group mb-3">
                                    <label class="form-label" for="access_token">Third Party API Token</label>
                                    <div>
                                        <input type="text" class="form-control" id="access_token" name="access_token"
                                               value="{{ setting('access_token', '') }}">
                                        <small class="form-hint text-danger">Third-party interface token (Image Hosting, Files List)</small>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="download_limit">Resource Download Frequency Limit (Times/Minute)</label>
                                    <div>
                                        <input type="text" class="form-control" id="download_limit"
                                               name="download_limit"
                                               value="{{ setting('download_limit', 0) }}">
                                        <small class="form-hint text-danger">Global file direct link access rate limit</small>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="user_limit">Single User Download Frequency Limit (Times/Minute)</label>
                                    <div>
                                        <input type="text" class="form-control" id="user_limit"
                                               name="user_limit"
                                               value="{{ setting('user_limit', 0) }}">
                                        <small class="form-hint text-danger">Single user file direct link access rate limit (based on IP statistics)</small>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label" for="api_limit">Interface Access Frequency Limit (Times/Minute)</label>
                                    <div>
                                        <input type="text" class="form-control" id="api_limit" name="api_limit"
                                               value="{{ setting('api_limit', 0) }}">
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="show-config">
                            <form action="" method="post">
                                @csrf
                                <p class="form-text text-danger">File Display Type (Extension Name) Space Separation</p>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="show_image">Images</label>
                                    <div>
                                        <input type="text" class="form-control" id="show_image" name="show_image"
                                               value="{{ setting('show_image', '') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="show_video">Videos</label>
                                    <div>
                                        <input type="text" class="form-control" id="show_video" name="show_video"
                                               value="{{ setting('show_video', '') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="show_dash">Dash Videos</label>
                                    <div>
                                        <input type="text" class="form-control" id="show_dash" name="show_dash"
                                               value="{{ setting('show_dash', '') }}">
                                        <span class="form-hint text-danger">Personal accounts are not supported</span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="show_audio">Audios</label>
                                    <div>
                                        <input type="text" class="form-control" id="show_audio" name="show_audio"
                                               value="{{ setting('show_audio', '') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="show_doc">Office Documents</label>
                                    <div>
                                        <input type="text" class="form-control" id="show_doc" name="show_doc"
                                               value="{{ setting('show_doc', '') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="show_code">Code Files</label>
                                    <div>
                                        <input type="text" class="form-control" id="show_code" name="show_code"
                                               value="{{ setting('show_code', '') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="show_stream">File Streaming</label>
                                    <div>
                                        <input type="text" class="form-control" id="show_stream" name="show_stream"
                                               value="{{ setting('show_stream', '') }}">
                                    </div>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="image-config">
                            <form action="" method="post">
                                @csrf

                                <div class="form-group mb-3 ">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="open_image_host"
                                               @if( setting('open_image_host',0)) checked
                                               @endif onchange="$('input[name=\'open_image_host\']').val(Number(this.checked))">
                                        <span class="form-check-label">Enable Image Hosting</span>
                                        <input type="hidden" name="open_image_host"
                                               value="{{ setting('open_image_host', 0) }}">
                                    </label>
                                    <span class="form-hint text-danger">OneDrive can be used as an image bed after turning on</span>
                                </div>

                                <div class="form-group mb-3 ">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="public_image_host"
                                               @if( setting('public_image_host',0)) checked
                                               @endif onchange="$('input[name=\'public_image_host\']').val(Number(this.checked))">
                                        <span class="form-check-label">Set As Public</span>
                                        <input type="hidden" name="public_image_host"
                                               value="{{ setting('public_image_host', 0) }}">
                                    </label>
                                    <span class="form-hint text-danger">Anyone can access and use it after it is turned on</span>
                                </div>

                                <div class="form-group mb-3 ">
                                    <label class="form-label" for="image_host_account">Choose Account</label>
                                    <div>
                                        <select class="form-select" name="image_host_account" id="image_host_account">
                                            @foreach( $accounts as $key => $account)
                                                <option value="{{ $account['id'] }}"
                                                        @if(setting('image_host_account') === $account['id'] ) selected @endif>
                                                    {{ $account['remark'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-hint text-danger">Use the main account by default.</small>
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

        </div>
    </div>
@stop
