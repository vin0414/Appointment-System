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
                    <a href="{{ route('deployment/records/view',['id'=>$applicant->applicant_id]) }}"
                        class="btn btn-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h1.5" />
                            <path d="M15 18a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M20.2 20.2l1.8 1.8" />
                        </svg>
                        &nbsp;View
                    </a>
                    <a href="{{ route('deployment/records') }}" class="btn btn-success btn-5 d-none d-sm-inline-block">
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
                    <a href="{{ route('deployment/records') }}" class="btn btn-primary btn-6 d-sm-none btn-icon">
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
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-home" class="nav-link active" data-bs-toggle="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-address-book">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2" />
                                <path d="M10 16h6" />
                                <path d="M11 11a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M4 8h3" />
                                <path d="M4 12h3" />
                                <path d="M4 16h3" />
                            </svg>
                            &nbsp;Appointing
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-edit" class="nav-link" data-bs-toggle="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415" />
                                <path d="M16 5l3 3" />
                            </svg>
                            &nbsp;Edit Info
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tabs-home">
                        <div class="row g-2">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-id">
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
                                            <input type="hidden" name="applicant"
                                                value="{{ $applicant->applicant_id }}" />
                                            <div class="col-lg-12">
                                                <div class="row g-2">
                                                    <div class="col-lg-3">
                                                        <label class="form-label">Salary Grade</label>
                                                        <select name="salary_grade" class="form-select">
                                                            <option value="">Choose</option>
                                                            @foreach($salary as $row)
                                                            <option value="{{ $row->salary_id }}"
                                                                {{ !empty($info) && $info->salary_id == $row->salary_id ? 'selected' : '' }}>
                                                                {{ $row->salary_grade }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div id="salary_grade-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="form-label">Employment (Permanent, Temporary,
                                                            etc)</label>
                                                        <input type="text" class="form-control" name="employment"
                                                            value="{{ $info->employment_type ?? '' }}">
                                                        <div id="employment-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">Nature of Appointment</label>
                                                        <input type="text" class="form-control" name="appointment"
                                                            value="{{ $info->appointment ?? '' }}">
                                                        <div id="appointment-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row g-2">
                                                    <div class="col-lg-8">
                                                        <label class="form-label">Vice</label>
                                                        <input type="text" class="form-control" name="person"
                                                            value="{{ $info->with ?? '' }}">
                                                        <div id="person-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">Status (Resigned, Retired
                                                            ,etc)</label>
                                                        <input type="text" class="form-control" name="status"
                                                            value="{{ $info->status ?? '' }}">
                                                        <div id="status-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row g-2">
                                                    <div class="col-lg-7">
                                                        <label class="form-label">Plantilla Item No</label>
                                                        <input type="text" class="form-control" name="item"
                                                            value="{{ $info->item ?? '' }}">
                                                        <div id="item-error" class="error-message text-danger text-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label class="form-label">Page</label>
                                                        <input type="number" class="form-control" name="page"
                                                            value="{{ $info->page ?? '' }}">
                                                        <div id="page-error" class="error-message text-danger text-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="form-label">Date Signed</label>
                                                        <input type="date" class="form-control" name="date"
                                                            value="{{ $info->date_signed ?? '' }}">
                                                        <div id="date-error" class="error-message text-danger text-sm">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row g-2">
                                                    <div class="col-lg-4">
                                                        <label class="form-label">Position</label>
                                                        <input type="text" class="form-control" name="position"
                                                            value="{{ $applicant->position }}">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="form-label">Level</label>
                                                        <select name="level" class="form-select">
                                                            <option value="">Choose</option>
                                                            <option value="Elementary"
                                                                {{ !empty($info) && $info->level == "Elementary" ? 'selected' : '' }}>
                                                                Elementary</option>
                                                            <option value="Secondary"
                                                                {{ !empty($info) && $info->level == "Secondary" ? 'selected' : '' }}>
                                                                Secondary</option>
                                                            <option value="Senior High School"
                                                                {{ !empty($info) && $info->level == "Senior High School" ? 'selected' : '' }}>
                                                                Senior High School</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="form-label">Published in</label>
                                                        <input type="text" class="form-control" name="publisher"
                                                            value="{{ $info->publisher ?? '' }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="row g-2">
                                                    <div class="col-lg-6">
                                                        <label class="form-label">From</label>
                                                        <input type="date" class="form-control" name="published_from"
                                                            value="{{ $info->published_from ?? '' }}">
                                                        <div id="published_from-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="form-label">to</label>
                                                        <input type="date" class="form-control" name="published_to"
                                                            value="{{ $info->published_to ?? '' }}">
                                                        <div id="published_to-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="form-label">Posted in SDO/School/LGU Bulletin
                                                    board</label>
                                                <div class="row g-2">
                                                    <div class="col-lg-6">
                                                        <label class="form-label">From</label>
                                                        <input type="date" class="form-control" name="posted_from"
                                                            value="{{ $info->posted_from ?? '' }}">
                                                        <div id="posted_from-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="form-label">to</label>
                                                        <input type="date" class="form-control" name="posted_to"
                                                            value="{{ $info->posted_to ?? '' }}">
                                                        <div id="posted_to-error"
                                                            class="error-message text-danger text-sm"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="form-label">Assessment Started on</label>
                                                <input type="date" class="form-control" name="assessment"
                                                    value="{{ $info->assessment_date ?? '' }}">
                                                <div id="assessment-error" class="error-message text-danger text-sm">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <i>Last Modified : {{ $info->updated_at ?? 'N/A' }}</i>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="ti ti-device-floppy"></i>&nbsp;Save Data
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
                                            <input type="hidden" name="applicant"
                                                value="{{ $applicant->applicant_id }}" />
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
                                                    <i class="ti ti-plus"></i>&nbsp;Assign
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-edit">
                        <form method="POST" class="row g-3" id="frmEdit">
                            @csrf
                            <input type="hidden" name="applicant_id" value="{{ $applicant->applicant_id }}">
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <label class="form-label">Surname</label>
                                        <input type="text" class="form-control" name="sur_name"
                                            value="{{ $applicant->sur_name }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $applicant->first_name }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label">M.I.</label>
                                        <input type="text" class="form-control" name="middle_name"
                                            value="{{ $applicant->middle_name }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label">Suffix</label>
                                        <input type="text" class="form-control" name="suffix"
                                            value="{{ $applicant->suffix }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-lg-3">
                                        <label class="form-label">Position</label>
                                        <input type="text" class="form-control" name="position"
                                            value="{{ $applicant->position }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label">Gender</label>
                                        <input type="text" class="form-control" name="gender"
                                            value="{{ $applicant->gender }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Govt. ID</label>
                                        <input type="text" class="form-control" name="government_id"
                                            value="{{ $applicant->government_id }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label">ID Number</label>
                                        <input type="text" class="form-control" name="id_number"
                                            value="{{ $applicant->id_number }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label">Date Issued</label>
                                        <input type="date" class="form-control" name="date_issued"
                                            value="{{ $applicant->date_issued }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Residential Address</label>
                                <textarea name="address" class="form-control">{{ $applicant->address }}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <label class="form-label">Highest Educational Attainment</label>
                                        <input type="text" class="form-control" name="education"
                                            value="{{ $applicant->education }}" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Total Years/Month Relevant Experience</label>
                                        <input type="text" class="form-control" name="experience"
                                            value="{{ $applicant->experience }}" />
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Total Hours Relevant Trainings/Seminars</label>
                                        <input type="text" class="form-control" name="training"
                                            value="{{ $applicant->training }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="ti ti-device-floppy"></i>&nbsp;Save Changes
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

$('#form').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('records/save') }}",
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

$('#frmEdit').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('records/update') }}",
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