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
            <div class="col-lg-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total Applicants</h5>
                        <h1>{{ $applicants }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Evaluated Applicants</h5>
                        <h1>{{ $other }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Appointed</h5>
                        <h1>{{ $assignment }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total Schools</h5>
                        <h1>{{ $schools }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>Total IPCRF</h5>
                        <h1>0</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5>IPCRF Rating</h5>
                        <h1>0%</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-deck mb-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <canvas id="schoolChart"></canvas>
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
        </div>
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Outstanding Teachers</div>
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

const ctx = document.getElementById('schoolChart').getContext('2d');
const schoolChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Applicants per School',
            data: values,
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

const backgroundColor = labelx.map(() =>
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
                display: true,
                position: 'bottom'
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