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
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-server-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                        <path d="M3 12m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                        <path d="M7 8l0 .01" />
                        <path d="M7 16l0 .01" />
                        <path d="M11 8h6" />
                        <path d="M11 16h6" />
                    </svg>
                    &nbsp;Database Back-Up
                </div>
                <div class="card-text mb-2">Reminder: Please make sure to back up the database to avoid any potential
                    data loss</div>
                <a href="{{ route('download') }}" class="btn btn-outline-secondary">
                    <i class="ti ti-download"></i>&nbsp;Download
                </a>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <i class="ti ti-database-cog"></i>&nbsp;Database Configuration
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label class="form-label">Database/Schema</label>
                                <input type="text" class="form-control"
                                    value="{{ config('database.connections.mysql.database') }}" />
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control"
                                            value="{{ config('database.connections.mysql.username') }}" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Port</label>
                                        <input type="text" class="form-control"
                                            value="{{ config('database.connections.mysql.port') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <i class="ti ti-world-cog"></i>&nbsp;System Information
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label class="form-label">Project Version</label>
                                <input type="text" class="form-control" value="{{ app()->version() }}" />
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Current PHP Version</label>
                                <input type="text" class="form-control" value="<?= phpversion()?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
