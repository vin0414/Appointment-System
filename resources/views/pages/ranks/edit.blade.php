@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title"><?= $title ?> / <?= $subtitle ?></h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('ranks') }}" class="btn btn-success btn-5 d-none d-sm-inline-block">
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
                    <a href="{{ route('ranks') }}" class="btn btn-primary btn-6 d-sm-none btn-icon">
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
                <div class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M9 12h6" />
                        <path d="M12 9v6" />
                    </svg>
                    New Teaching Rank
                </div>
            </div>
            <div class="card-body">
                <form method="POST" class="row g-3" id="form">
                    @csrf
                    <input type="hidden" name="rank_id" value="{{ $ranks->rank_id }}">
                    <div class="col-lg-12">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label">Position Applied For</label>
                                <input type="text" class="form-control" name="position"
                                    value="{{ $ranks->position }}" />
                                <div id="position-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">PPST Career Stage</label>
                                <input type="text" class="form-control" name="career_stage"
                                    value="{{ $ranks->career_stage }}" />
                                <div id="career_stage-error" class="error-message text-danger text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row g-3">
                            <div class="col-lg-3">
                                <label class="form-label">Classroom Observable Indicator</label>
                                <input type="number" class="form-control" name="coi" min="1"
                                    value="{{ $ranks->coi }}" />
                                <div id="coi-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Competency</label>
                                <select class="form-select" name="coi_competency">
                                    <option value="">Choose</option>
                                    <option value="O" {{ $ranks->coi_competency =='O' ? 'selected' : '' }}>Outstanding
                                    </option>
                                    <option value="VS" {{ $ranks->coi_competency =='VS' ? 'selected' : '' }}>Very
                                        Satisfactory</option>
                                    <option value="S" {{ $ranks->coi_competency =='S' ? 'selected' : '' }}>Satisfactory
                                    </option>
                                    <option value="US" {{ $ranks->coi_competency =='US' ? 'selected' : '' }}>
                                        Unsatisfactory</option>
                                    <option value="P" {{ $ranks->coi_competency =='P' ? 'selected' : '' }}>Poor</option>
                                </select>
                                <div id="coi_competency-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Non-Classroom Observable Indicator</label>
                                <input type="number" class="form-control" name="ncoi" min="1"
                                    value="{{ $ranks->ncoi }}" />
                                <div id="ncoi-error" class="error-message text-danger text-sm"></div>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Competency</label>
                                <select class="form-select" name="ncoi_competency">
                                    <option value="">Choose</option>
                                    <option value="O" {{ $ranks->ncoi_competency =='O' ? 'selected' : '' }}>Outstanding
                                    </option>
                                    <option value="VS" {{ $ranks->ncoi_competency =='VS' ? 'selected' : '' }}>Very
                                        Satisfactory</option>
                                    <option value="S" {{ $ranks->ncoi_competency =='S' ? 'selected' : '' }}>Satisfactory
                                    </option>
                                    <option value="US" {{ $ranks->ncoi_competency =='US' ? 'selected' : '' }}>
                                        Unsatisfactory</option>
                                    <option value="P" {{ $ranks->ncoi_competency =='P' ? 'selected' : '' }}>Poor
                                    </option>
                                </select>
                                <div id="ncoi_competency-error" class="error-message text-danger text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Teaching Rank Status</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="status" value="1" class="form-selectgroup-input" />
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
                                    <input type="radio" name="status" value="0" class="form-selectgroup-input" />
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
                        <button type="submit" class="btn btn-success" id="btnSave">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <path d="M10 14a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M14 4l0 4l-6 0l0 -4" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$('#form').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('ranks/update') }}",
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
                    window.location.href = "{{ route('ranks') }}";
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
