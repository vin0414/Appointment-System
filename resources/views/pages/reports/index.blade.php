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
        <div class="row g-2">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-filter">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227" />
                            </svg>
                            &nbsp;Filter
                        </div>
                        <form method="GET" class="row g-2" id="form">
                            <div class="col-lg-12">
                                <label class="form-label">Month</label>
                                <select name="month" class="form-select">
                                    <option value="">Choose</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                @php
                                $startYear = date('Y');
                                $numberOfYears = 5;

                                $years = [];
                                for ($i = -1; $i < $numberOfYears; $i++) { $years[]=$startYear + $i; } @endphp <label
                                    class="form-label">Year</label>
                                    <select name="year" class="form-select">
                                        <option value="">Choose</option>
                                        @foreach($years as $year)
                                        <option>{{ $year }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-success">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <th>Name</th>
                            <th>Position and Salary Grade</th>
                            <th>Date of Appointment</th>
                            <th>School/Office Assignment</th>
                            <th>Nature of <br />Appointment</th>
                        </thead>
                        <tbody id="result">
                            <tr>
                                <td colspan="5" class="text-center">No Record(s)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#form').on('submit', function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('#result').html("<tr><td colspan='5'><center>Loading.....</center></td></tr>");
    $.ajax({
        url: "{{ route('reports/generate') }}",
        method: 'GET',
        data: data,
        success: function(data) {
            console.log(data);
            if (data.length == 0) {
                $('#result').html(
                    "<tr><td colspan='5'><center>No Data Found(s)</center></td></tr>");
                return;
            } else {
                let rows = '';
                $.each(data.data ?? data, function(index, p) {
                    rows += `
                        <tr>
                            <td>${p.first_name ?? ''} ${p.middle_name ?? ''} ${p.sur_name ?? ''} ${p.suffix ?? ''}</td>
                            <td>${p.position ?? ''}-${p.salary_grade ?? ''}</td>
                            <td>${
                                p.created_at
                                    ? new Date(p.created_at).toLocaleDateString('en-US', {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    })
                                    : ''
                            }</td>
                            <td>${p.school_name ?? ''}</td>
                            <td>${p.appointment ?? ''}</td>
                        </tr>
                    `;
                });

                $('#table tbody').html(rows);
            }
        }
    });
});
</script>
@endsection
