@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title">{{ $title }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('maintenance/accounts/create') }}"
                        class="btn btn-success btn-5 d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                        </svg>
                        New Account
                    </a>
                    <a href="{{ route('maintenance/accounts/create') }}"
                        class="btn btn-primary btn-6 d-sm-none btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
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
                <div class="card-title">Accounts</div>
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <th>Date Created</th>
                            <th>Fullname</th>
                            <th>Email Address</th>
                            <th>Token</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $row)
                            <tr>
                                <td>{{ date('M d, Y h:i a',strtotime($row->created_at)) }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->remember_token }}</td>
                                <td>{{ !empty($row->email_verified_at) ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" role="button">
                                        <span>Action</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('maintenance/accounts/edit',['id'=>$row->remember_token]) }}"
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
                                            &nbsp;Edit Account
                                        </a>
                                        <button type="button" class="dropdown-item reset" value="{{ $row->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-refresh">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                            </svg>
                                            &nbsp;Reset
                                        </button>
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
$(document).on('click', '.reset', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to reset this account?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Continue',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        // Action based on user's choice
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('accounts/reset') }}",
                method: "POST",
                data: {
                    value: $(this).val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 200) {
                        Swal.fire({
                            title: 'Great!',
                            text: "Successfully reset",
                            icon: 'success',
                            confirmButtonText: 'Continue'
                        }).then((result) => {
                            // Action based on user's choice
                            if (result.isConfirmed) {
                                //do nothing
                            }
                        });
                    } else {
                        var errors = response.errors;
                        swal.fire({
                            title: 'Warning',
                            text: errors.message,
                            icon: 'warning'
                        });
                    }
                }
            });
        }
    });
});
</script>
@endsection
