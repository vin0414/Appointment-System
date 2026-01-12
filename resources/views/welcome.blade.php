@extends('layouts.app')

@section('content')
<div class="container container-tight py-2">
    <center>
        <img src="{{ asset('assets/images/deped-gentri-logo.png') }}" alt="logo" width="100px" class="mb-4" />
    </center>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center">{{ config('app.name') }}</h2>
            <p class="text-center">Please fill in the form to continue</p>
            <form class="row g-2" method="POST" id="form">
                @csrf
                <h4>Basic Information</h4>
                <div class="col-lg-12">
                    <div class="row g-2">
                        <div class="col-lg-8">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Juan" value=""
                                autocomplete="off" />
                            <div id="first_name-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">M.I.</label>
                            <input type="text" name="middle_name" class="form-control" placeholder="A." value=""
                                autocomplete="off" />
                            <div id="middle_name-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-8">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="sur_name" class="form-control" placeholder="Dela Cruz" value=""
                                autocomplete="off" />
                            <div id="sur_name-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Suffix</label>
                            <input type="text" name="suffix" class="form-control" placeholder="" value=""
                                autocomplete="off" />
                            <div id="suffix-error" class="error-message text-danger text-sm"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row g-2">
                        <div class="col-lg-8">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" />
                            <div id="position-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="">Choose</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <div id="gender-error" class="error-message text-danger text-sm"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Government ID</label>
                    <input type="text" class="form-control" name="government_id" />
                    <div id="government_id-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <div class="row g-2">
                        <div class="col-lg-6">
                            <label class="form-label">ID Number</label>
                            <input type="text" class="form-control" name="id_number" />
                            <div id="id_number-error" class="error-message text-danger text-sm"></div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Date Issued</label>
                            <input type="date" class="form-control" name="date_issued" />
                            <div id="date_issued-error" class="error-message text-danger text-sm"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Residential Address</label>
                    <textarea class="form-control" name="address"></textarea>
                    <div id="address-error" class="error-message text-danger text-sm"></div>
                </div>
                <h5>Qualification Standard</h5>
                <div class="col-lg-12">
                    <label class="form-label">Highest Educational Attainment</label>
                    <input type="text" class="form-control" name="education" />
                    <div id="education-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Total Years/Month Relevant Experience</label>
                    <input type="text" class="form-control" name="experience" />
                    <div id="experience-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Total Hours Relevant Trainings/Seminars</label>
                    <input type="text" class="form-control" name="training" />
                    <div id="training-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success w-100">Submit Application</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="modal-loading" data-bs-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="mb-2">
                    <dotlottie-wc src="https://lottie.host/ed13f8d5-bc3f-4786-bbb8-36d06a21a6cb/XMPpTra572.lottie"
                        style="width: 100%;height: auto;" autoplay loop></dotlottie-wc>
                </div>
                <div>Loading</div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');
    let isDirty = false;

    // Detect changes on all inputs
    form.querySelectorAll('input, textarea, select').forEach((el) => {
        el.addEventListener('change', () => {
            isDirty = true;
        });
        el.addEventListener('input', () => {
            isDirty = true;
        });
    });

    // Prevent accidental navigation
    window.addEventListener('beforeunload', function(e) {
        if (isDirty) {
            e.preventDefault();
            e.returnValue = ''; // Required for Chrome
        }
    });

    // If form is submitted, disable the warning
    form.addEventListener('submit', function() {
        isDirty = false;
    });
});

$('#form').submit(function(e) {
    e.preventDefault();
    let data = $(this).serialize();
    $('.error-message').html('');
    $('#modal-loading').modal('show');

    $.ajax({
        url: "{{ route('applicant/save') }}",
        method: "POST",
        data: data,
        success: function(response) {
            $('#modal-loading').modal('hide');
            if (response.status == 200) {
                // Success logic here
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message || 'Form submitted successfully!',
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
            $('#modal-loading').modal('hide');
            console.log(xhr.responseJSON);
        }
    });
});
</script>
@endsection
