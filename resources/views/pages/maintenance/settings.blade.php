@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title"><?= $title ?></h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <button type="button" class="btn btn-success btn-5 d-none d-sm-inline-block add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        &nbsp;Add
                    </button>
                    <button type="button" class="btn btn-primary btn-6 d-sm-none btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </button>
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
                            &nbsp;System Logs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-salary" class="nav-link" data-bs-toggle="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
                            </svg>
                            &nbsp;Salary Grades
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tabs-home">
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
                                        <td>{{ date('M d, Y h:i a',strtotime($row->created_at)) }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->activities }}</td>
                                        <td>{{ $row->ip_address }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-salary">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered table-striped" id="tables">
                                <thead>
                                    <th>Date</th>
                                    <th>Salary Grade</th>
                                    <th>Amount</th>
                                    <th>Amount In Words</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach($salary as $row)
                                    <tr>
                                        <td>{{ date('M d, Y h:i a',strtotime($row->created_at)) }}</td>
                                        <td>SG/JG/PG {{ $row->salary_grade }}</td>
                                        <td>{{ number_format($row->amount,2) }}</td>
                                        <td>{{ $row->amount_in_words }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success edit"
                                                value="{{ $row->salary_id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                                &nbsp;Edit
                                            </button>
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
    </div>
</div>
<div class="modal modal-blur fade" id="addModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">New Salary Grade</div>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-2" id="form">
                    @csrf
                    <div class="col-lg-12">
                        <label class="form-label">Salary Grade</label>
                        <input type="number" class="form-control" name="salary_grade" />
                        <div id="salary_grade-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount" />
                        <div id="amount-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <path d="M10 14a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M14 4l0 4l-6 0l0 -4" />
                            </svg>
                            &nbsp;Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="editModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Edit Salary Grade</div>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-2" id="frmEdit">
                    @csrf
                    <input type="hidden" name="salary_id" id="salary_id">
                    <div class="col-lg-12">
                        <label class="form-label">Salary Grade</label>
                        <input type="number" class="form-control" name="edit_salary_grade" />
                        <div id="edit_salary_grade-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Amount</label>
                        <input type="text" class="form-control" name="edit_amount" />
                        <div id="edit_amount-error" class="error-message text-danger text-sm"></div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <path d="M10 14a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M14 4l0 4l-6 0l0 -4" />
                            </svg>
                            &nbsp;Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$('#table').DataTable();
$('#tables').DataTable();
$(document).on('click', '.add', function() {
    $('#addModal').modal('show');
});
$('#form').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('salary/save') }}",
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

$(document).on('click', '.edit', function() {
    let id = $(this).val();
    $.ajax({
        url: "{{ route('salary/fetch') }}",
        method: "GET",
        data: {
            value: id
        },
        success: function(data) {
            if (data.status == 200) {
                let info = data.data;
                $('#salary_id').val(info.salary_id);
                $('input[name="edit_salary_grade"]').val(info.salary_grade);
                $('input[name="edit_amount"]').val(info.amount);
                $('#editModal').modal('show');
            }
        }
    });
});

$('#frmEdit').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $.ajax({
        url: "{{ route('salary/edit') }}",
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