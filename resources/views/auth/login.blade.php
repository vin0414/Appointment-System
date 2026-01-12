@extends('layouts.app')

@section('content')
<div class="container container-tight py-4">
    <center><img src="{{ asset('assets/images/deped-gentri-logo.png') }}" alt="logo" width="100px" class="mb-4" />
    </center>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center">{{ config('app.name') }}</h2>
            <p class="text-center">Login to your account</p>
            @if(session('error'))
            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('sign-in') }}" method="POST" autocomplete="off" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="juan.delacruz@gmail.com"
                        value="<?=old('email')?>" autocomplete="off" />
                    @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        Password
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" name="password" id="password" minlength="8"
                            maxlength="16" placeholder="Your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            autocomplete="off" />
                        <span class="input-group-text">
                            <a href="javascript:void(0);" onclick="toggle()" class="link-secondary"
                                title="Show password" data-bs-toggle="tooltip">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/eye -->
                                <i id="icon" class="ti ti-eye-closed"></i>
                            </a>
                        </span>
                    </div>
                    @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" />
                        <span class="form-check-label">Remember me on this device</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-success w-100">Sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function toggle() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        let elem = document.getElementById('icon');
        elem.classList.remove("ti-eye-closed");
        elem.classList.add("ti-eye");
    } else {
        x.type = "password";
        let elem = document.getElementById('icon');
        elem.classList.remove("ti-eye");
        elem.classList.add("ti-eye-closed");
    }
}
</script>
@endsection