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
        <div class="row g-2 mb-2">
            <div class="col-lg-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total Applicants</h5>
                        <h1>{{ $applicants }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Evaluated Applicants</h5>
                        <h1>{{ $other }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Appointed</h5>
                        <h1>{{ $assignment }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total Schools</h5>
                        <h1>{{ $schools }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <canvas></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <canvas></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
