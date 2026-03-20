@extends('layouts.main')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">{{ config('app.name') }}</div>
                <h2 class="page-title"><?= $title ?> | Upload IPCRF</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <i class="ti ti-cloud-upload"></i>&nbsp;Upload
                </div>
            </div>
            <div class="card-body">
                <form method="POST" class="row g-3" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="col-lg-12">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label class="form-label">Bureau/Center/Service/Division</label>
                                <select class="form-select" name="office" id="office">
                                    <option value="">Choose</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">School Year</label>
                                <input type="text" class="form-control" name="school_year"
                                    placeholder="eg. SY 2025-2026" />
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Date of Review</label>
                                <input type="date" class="form-control" name="date_review" placeholder="Review Date" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row g-3">
                            <div class="col-lg-4">
                                <label class="form-label">Name of Employee</label>
                                <input type="text" class="form-control" name="employee"
                                    placeholder="eg. Juan Dela Cruz" />
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control" name="from_position"
                                    placeholder="eg. Teacher I" />
                            </div>
                            <div class="col-lg-2">
                                <label class="form-label">Applying For</label>
                                <input type="text" class="form-control" name="to_position"
                                    placeholder="eg. Teacher III" />
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Name of Rater</label>
                                <input type="text" class="form-control" name="rater" placeholder="eg. Juan Dela Cruz" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Attachment</label>
                        <div class="dropzone" id="dropzone">
                            <p>Drag & Drop files here or click to select files</p>
                            <input type="file" id="fileInput" name="file" accept="application/pdf" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success" id="btnUpload">
                            <i class="ti ti-upload"></i>&nbsp;Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("office")), {
            copyClassesToDropdown: false,
            dropdownParent: "body",
            controlInput: "<input>",
            render: {
                item: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + "</span>" + escape(data.text) + "</div>";
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + "</span>" + escape(data.text) + "</div>";
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});
</script>
@endsection
