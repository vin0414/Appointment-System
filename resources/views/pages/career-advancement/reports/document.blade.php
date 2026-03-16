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
            <div class="col-lg-12">
                <form method="GET" class="row g-3" id="form">
                    @csrf
                    <div class="col-lg-2">
                        <select class="form-select" name="year">
                            <option value="">School Year</option>
                            @for ($i = date('Y'); $i >= date('Y', strtotime('-3 years')); $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-lg-5">
                        <select class="form-select" name="office" id="office">
                            <option value="">School/Division</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-icon">
                            <input type="search" name="search" class="form-control" placeholder="Search...." />
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-1">
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-success" id="btnSearch">
                            <i class="ti ti-search"></i>&nbsp;Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-12">

            </div>
        </div>
    </div>
</div>
@endsection
