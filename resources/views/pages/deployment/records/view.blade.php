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
                    <a href="{{ route('appointment/records/edit',['id'=>$applicant->applicant_id]) }}"
                        class="btn btn-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415" />
                            <path d="M16 5l3 3" />
                        </svg>
                        &nbsp;Edit
                    </a>
                    <a href="{{ route('appointment/records') }}" class="btn btn-success btn-5 d-none d-sm-inline-block">
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
                    <a href="{{ route('appointment/records') }}" class="btn btn-primary btn-6 d-sm-none btn-icon">
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
        @if(session('fail'))
        <div class="alert alert-important alert-danger alert-dismissible" role="alert">
            {{ session('fail') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-stack">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 6l-8 4l8 4l8 -4l-8 -4" />
                        <path d="M4 14l8 4l8 -4" />
                    </svg>
                    &nbsp;Summary
                </div>
                <div class="row g-2">
                    <div class="col-lg-12">
                        <div class="row g-2">
                            <div class="col-lg-4">
                                <label class="form-label">First Name</label>
                                <p class="form-control">{{ $applicant->first_name }}</p>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label">M. I.</label>
                                <p class="form-control">{{ $applicant->middle_name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Last Name</label>
                                <p class="form-control">{{ $applicant->sur_name }}</p>
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label">Suffix</label>
                                <p class="form-control">{{ $applicant->suffix ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Residential Address</label>
                        <textarea class="form-control" readonly>{{ $applicant->address }}</textarea>
                    </div>
                    <div class="col-lg-12">
                        <div class="row g-2">
                            <div class="col-lg-2">
                                <label class="form-label">Gender</label>
                                <p class="form-control">{{ $applicant->gender }}</p>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Government ID</label>
                                <p class="form-control">{{ $applicant->government_id }}</p>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">ID Number</label>
                                <p class="form-control">{{ $applicant->id_number }}</p>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Date Issued</label>
                                <p class="form-control">{{ $applicant->date_issued }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row g-2">
                            <div class="col-lg-4">
                                <label class="form-label">Highest Education Attainment</label>
                                <input type="text" class="form-control" value="{{ $applicant->education }}">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Total Years/Month Relevant Work Experience</label>
                                <input type="text" class="form-control" value="{{ $applicant->experience }}">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Total Hours Relevant Training/Seminars</label>
                                <input type="text" class="form-control" value="{{ $applicant->training }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Choose to Download</label>
                        <a href="{{ route('export/form/32',['id'=>$applicant->applicant_id]) }}"
                            class="btn btn-default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                <path d="M7 11l5 5l5 -5" />
                                <path d="M12 4l0 12" />
                            </svg>
                            &nbsp;Form No. 32
                        </a>
                        <a href="{{ route('export/form/33/B',['id'=>$applicant->applicant_id]) }}"
                            class="btn btn-default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                <path d="M7 11l5 5l5 -5" />
                                <path d="M12 4l0 12" />
                            </svg>
                            &nbsp;Form No. 33-B
                        </a>
                        <a href="{{ route('export/form/4',['id'=>$applicant->applicant_id]) }}" class="btn btn-default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                <path d="M7 11l5 5l5 -5" />
                                <path d="M12 4l0 12" />
                            </svg>
                            &nbsp;Form No. 4
                        </a>
                        <a href="{{ route('export/form/1',['id'=>$applicant->applicant_id]) }}" class="btn btn-default">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                <path d="M7 11l5 5l5 -5" />
                                <path d="M12 4l0 12" />
                            </svg>
                            &nbsp;Checklist
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection