@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title">Accounts</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('maintenance/accounts') }}"
                        class="btn btn-success btn-5 d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l4 4" />
                            <path d="M5 12l4 -4" />
                        </svg>
                        Back
                    </a>
                    <a href="{{ route('maintenance/accounts') }}" class="btn btn-primary btn-6 d-sm-none btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l14 0" />
                            <path d="M5 12l4 4" />
                            <path d="M5 12l4 -4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row g-2">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{ $title }}</div>
                        <form method="POST" class="row g-2" id="form" autocomplete="off">
                            @csrf
                            <div class="col-lg-12">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter here..." />
                                <div id="email-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-lg-6">
                                        <label class="form-label">Complete Name</label>
                                        <input type="text" class="form-control" name="fullname"
                                            placeholder="Enter here..." />
                                        <div id="fullname-error" class="error-message text-danger text-sm"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter here..." />
                                        <div id="password-error" class="error-message text-danger text-sm"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Account Status</label>
                                <div class="form-selectgroup-boxes row mb-3">
                                    <div class="col-lg-6">
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="status" value="1"
                                                class="form-selectgroup-input" />
                                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                                <span class="me-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </span>
                                                <span class="form-selectgroup-label-content">
                                                    <span class="form-selectgroup-title strong mb-1">Active</span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="status" value="0"
                                                class="form-selectgroup-input" />
                                            <span class="form-selectgroup-label d-flex align-items-center p-3">
                                                <span class="me-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </span>
                                                <span class="form-selectgroup-label-content">
                                                    <span class="form-selectgroup-title strong mb-1">Inactive</span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div id="status-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="form-control btn btn-success" id="btnSave">
                                    <i class="ti ti-device-floppy"></i>&nbsp;Save Account
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
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');
    let isDirty = false;

    // Detect changes on all inputs
    form.querySelectorAll('input, textarea, select').forEach((el) => {
        el.addEventListener('change', () => {
            isDirty = true;
        });
        el.addEventListener('input', () => {
            isDirty = true;
        });
    });

    // Prevent accidental navigation
    window.addEventListener('beforeunload', function(e) {
        if (isDirty) {
            e.preventDefault();
            e.returnValue = ''; // Required for Chrome
        }
    });

    // If form is submitted, disable the warning
    form.addEventListener('submit', function() {
        isDirty = false;
    });
});

$('#form').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('accounts/save') }}",
        method: "POST",
        data: data,
        success: function(response) {
            if (response.status == 200) {
                // Success logic here
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                }).then(() => {
                    location.href = "{{ route('maintenance/accounts') }}";
                });
            } else {
                var errors = response.errors;
                for (var field in errors) {
                    $('#' + field + '-error').html('<p>' + errors[field][0] + '</p>');
                    $('#' + field).addClass('text-danger');
                }
            }
        },
        error: function(xhr) {
            console.log(xhr.responseJSON);
        }
    });
});
</script>
@endsection
