@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title">
                    {{ $applicant->sur_name }}&nbsp;{{ $applicant->suffix }},&nbsp;{{ $applicant->first_name }}&nbsp;{{ $applicant->middle_name }}
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('records') }}" class="btn btn-success btn-5 d-none d-sm-inline-block">
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
                    <a href="{{ route('records') }}" class="btn btn-primary btn-6 d-sm-none btn-icon">
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-id">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M3 7a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3l0 -10" />
                                <path d="M7 10a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M15 8l2 0" />
                                <path d="M15 12l2 0" />
                                <path d="M7 16l10 0" />
                            </svg>
                            &nbsp;Other Details
                        </div>
                        <form method="POST" class="row g-2" id="form">
                            @csrf

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M11 15h1" />
                                <path d="M12 15v3" />
                            </svg>
                            &nbsp;Appointment
                        </div>
                        <form method="POST" class="row g-2" id="frmAssignment">
                            @csrf
                            <input type="hidden" name="applicant" value="{{ $applicant->applicant_id }}" />
                            <div class="col-lg-12">
                                <label class="form-label">School</label>
                                <select name="school" class="form-select" id="school">
                                    <option value="">Choose</option>
                                    @foreach($schools as $row)
                                    <option value="{{ $row->school_id }}"
                                        {{ !empty($assignment) && $assignment->school_id == $row->school_id ? 'selected' : '' }}>
                                        {{ $row->school_name }}</option>
                                    @endforeach
                                </select>
                                <div id="school-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="ti ti-send"></i>&nbsp;Submit
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
document.addEventListener("DOMContentLoaded", function() {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("school")), {
            copyClassesToDropdown: false,
            dropdownParent: "body",
            controlInput: "<input>",
            render: {
                item: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + "</span>" + escape(data.text) + "</div>";
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + "</span>" + escape(data.text) + "</div>";
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});
$('#frmAssignment').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('records/assign') }}",
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
                    location.reload();
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