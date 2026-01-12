@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title"><?= $title ?></h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('schools') }}" class="btn btn-success btn-5 d-none d-sm-inline-block">
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
                    <a href="{{ route('schools') }}" class="btn btn-primary btn-6 d-sm-none btn-icon">
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
                    <div class="card-header">
                        <div class="card-title">Edit School</div>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="row g-2" id="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $schools->school_id }}">
                            <div class="col-lg-12">
                                <label class="form-label">Name of School</label>
                                <textarea name="school" class="form-control">{{ $schools->school_name }}</textarea>
                                <div id="school-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Name of Principal</label>
                                <input type="text" class="form-control" name="principal"
                                    value="{{ $schools->principal }}" />
                                <div id="principal-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" name="designation"
                                    value="{{ $schools->designation }}" />
                                <div id="designation-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                        <path d="M10 14a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                    </svg>
                                    &nbsp;Save Changes
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
        url: "{{ route('schools/update') }}",
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
                    $('#form')[0].reset();
                    window.location.href = "{{ route('schools') }}";
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