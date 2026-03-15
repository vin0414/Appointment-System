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
        @if(session('fail'))
        <div class="alert alert-important alert-danger alert-dismissible" role="alert">
            {{ session('fail') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-server-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 7a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-2" />
                        <path d="M3 15a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3l0 -2" />
                        <path d="M7 8l0 .01" />
                        <path d="M7 16l0 .01" />
                        <path d="M11 8h6" />
                        <path d="M11 16h6" />
                    </svg>
                    &nbsp;{{ $title }}
                </div>
                <div class="card-actions">
                    <a href="{{ route('records/download') }}" class="btn btn-default">
                        <i class="ti ti-download"></i>&nbsp;Export
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <th>ID Number</th>
                            <th>Complete Name</th>
                            <th>Residential Address</th>
                            <th>Position</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($applicants as $row)
                            <tr>
                                <td>{{ $row->id_number }}</td>
                                <td>{{ $row->sur_name }}&nbsp;{{ $row->suffix }},&nbsp;{{ $row->first_name }}&nbsp;{{ $row->middle_name }}
                                </td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->position }}</td>
                                <td>{{ $row->gender }}</td>
                                <td>
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" role="button">
                                        <span>Action</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('appointment/records/edit',['id'=>$row->applicant_id]) }}"
                                            class="dropdown-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            &nbsp;Edit Record
                                        </a>
                                        <a href="{{ route('appointment/records/view',['id'=>$row->applicant_id]) }}"
                                            class="dropdown-item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-user-search">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h1.5" />
                                                <path d="M15 18a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                <path d="M20.2 20.2l1.8 1.8" />
                                            </svg>
                                            &nbsp;View
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#table').DataTable();
</script>
@endsection