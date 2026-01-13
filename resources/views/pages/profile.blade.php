@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title"><?= $title ?></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-user-cog">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" />
                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19.001 15.5v1.5" />
                                <path d="M19.001 21v1.5" />
                                <path d="M22.032 17.25l-1.299 .75" />
                                <path d="M17.27 20l-1.3 .75" />
                                <path d="M15.97 17.25l1.3 .75" />
                                <path d="M20.733 20l1.3 .75" />
                            </svg>
                            Account Information
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-lg-12">
                                <label class="form-label">Complete Name</label>
                                <p class="form-control">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-lg-8">
                                        <label class="form-label">Email</label>
                                        <p class="form-control">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">IP Address</label>
                                        <p class="form-control">{{ Illuminate\Support\Facades\Request::ip() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-lock-code">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2" />
                                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                <path d="M20 21l2 -2l-2 -2" />
                                <path d="M17 17l-2 2l2 2" />
                            </svg>
                            Account Password
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="row g-3" id="frmPassword">
                            @csrf
                            <div class="col-lg-12">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password" minlength="8"
                                    maxlength="16" id="current_password" />
                                <div id="current_password-error" class="error-message text-danger text-sm">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password" minlength="8"
                                    maxlength="16" id="new_password" />
                                <div id="new_password-error" class="error-message text-danger text-sm">
                                </div>
                            </div>
                            <div cs="col-lg-12">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" minlength="8"
                                    maxlength="16" id="cpassword" />
                                <div id="confirm_password-error" class="error-message text-danger text-sm">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="checkbox" class="form-check-input" id="showPassword" />
                                &nbsp;<label>Show Password</label>
                            </div>
                            <div cs="col-lg-12">
                                <button type="submit" class="btn btn-success form-control">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#showPassword').change(function() {
    togglePasswordVisibility(["current_password", "new_password", "cpassword"]);
});

function togglePasswordVisibility(ids) {
    ids.forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.type = input.type === "password" ? "text" : "password";
        }
    });
}

$('#frmPassword').on('submit', function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('accounts/password') }}",
        method: "POST",
        data: data,
        success: function(response) {
            if (response.status == 200) {
                // Success logic here
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message || 'Successfully applied changes',
                }).then(() => {
                    $('#frmPassword')[0].reset();
                    window.location.reload();
                });
            } else {
                var errors = response.errors;
                for (var field in errors) {
                    $('#' + field + '-error').html('<p>' + errors[field][0] + '</p>');
                    $('#' + field).addClass('text-danger');
                }
            }
        }
    });
});
</script>
@endsection