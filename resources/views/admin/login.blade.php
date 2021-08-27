<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ setting('site_name','OLAINDEX') . ' - Management' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tabler@1.0.0-alpha.8/dist/css/tabler.min.css">
</head>
<body class="antialiased border-top-wide border-primary d-flex flex-column">
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}">
                {{--                <img src="{{ asset('img/log.svg') }}" height="36" alt="">--}}
                <span class="h1">Management</span>
            </a>
        </div>
        <form class="card card-md" action="" method="post" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login Account</h2>
                <div class="mb-3">
                    <label class="form-label" for="name">Account</label>
                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name"
                           name="name" value="{{ old('name') }}" placeholder="Enter Username">
                    @if($errors->has('name'))
                        <div class="invalid-feedback"> {{ $errors->first('name') }}</div>
                    @endif

                </div>
                <div class="mb-2">
                    <label class="form-label" for="password">
                        Password
                    </label>
                    <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif"
                           name="password" id="password" placeholder="Enter Password" autocomplete="off">
                    @if($errors->has('password'))
                        <div class="invalid-feedback"> {{ $errors->first('password') }}</div>
                    @endif

                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember"/>
                        <span class="form-check-label">Remember the device</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/tabler@1.0.0-alpha.8/dist/libs/jquery/dist/jquery.slim.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/tabler@1.0.0-alpha.8/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/tabler@1.0.0-alpha.8/dist/js/tabler.min.js"></script>
</body>
</html>
