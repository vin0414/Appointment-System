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
            <div class="card-body">
                <div class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-address-book">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2" />
                        <path d="M10 16h6" />
                        <path d="M11 11a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M4 8h3" />
                        <path d="M4 12h3" />
                        <path d="M4 16h3" />
                    </svg>
                    &nbsp;System Logs
                </div>
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <th>Date & Time</th>
                            <th>Complete Name</th>
                            <th>Activities</th>
                            <th>IP Address</th>
                        </thead>
                        <tbody>
                            @foreach($logs as $row)
                            <tr>
                                <td>{{ date('M d,Y h:i a',strtotime($row->created_at)) }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->activities }}</td>
                                <td>{{ $row->ip_address }}</td>
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
