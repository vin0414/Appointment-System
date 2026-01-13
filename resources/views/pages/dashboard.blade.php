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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <canvas id="schoolPieChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <canvas id="positionChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                            </svg>
                            List of Schools
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="card-table table-responsive">
                            <table class="table table-vcenter">
                                <tbody>
                                    @forelse($list as $row)
                                    <tr>
                                        <td>
                                            <b>{{ $row->school_name }}</b><br />
                                            <small>{{ $row->principal }}</small>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No Record(s) found</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
const chartData = <?= json_encode($total) ?>;

// Extract labels and values
const labels = chartData.map(item => item.school_name);
const values = chartData.map(item => item.total);

const backgroundColors = labels.map(() =>
    `rgba(${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)}, 0.6)`
);

const ctx = document.getElementById('schoolPieChart').getContext('2d');
const schoolPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: 'Applicants per School',
            data: values,
            backgroundColor: backgroundColors,
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: true
            },
            title: {
                display: true,
                text: 'Applicants Distribution by School'
            }
        }
    }
});
</script>
<script>
const chartValues = <?= json_encode($position) ?>;

// Extract labels and values
const labelx = chartValues.map(item => item.position);
const value = chartValues.map(item => item.total);

const backgroundColor = labels.map(() =>
    `rgba(${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)}, 0.6)`
);

const charts = document.getElementById('positionChart').getContext('2d');
const positionChart = new Chart(charts, {
    type: 'pie',
    data: {
        labels: labelx,
        datasets: [{
            label: 'Applicants per Position',
            data: value,
            backgroundColor: backgroundColor,
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: true
            },
            title: {
                display: true,
                text: 'Applicants Distribution by Position'
            }
        }
    }
});
</script>
@endsection