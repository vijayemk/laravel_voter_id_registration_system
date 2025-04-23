@extends('layouts.app')

@section('content')
<div class="container">         
    <h2 class="mb-4 mt-4">Register Voter</h2>

    <form id="voter-form" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="taluk">Taluk</label>
                <input type="text" name="taluk" id="taluk" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="district">District</label>
                <input type="text" name="district" id="district" class="form-control" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="state">State</label>
                <input type="text" name="state" id="state" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Register Voter</button>
    </form>
</div>

<!-- Centered Full Page Loader -->
<div id="loadingSpinnerWrapper" style="display: none; position: fixed; top: 0px; left: 0px; width: 100vw; height: 100vh; background-color: rgba(255, 255, 255, 0.6); z-index: 9999; align-items: center; justify-content: center;">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<!-- Toast Container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
    <div id="successToast" class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Voter registered successfully!
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $('#voter-form').submit(function (e) {
            e.preventDefault();

            $('#loadingSpinnerWrapper').css('display', 'flex');

            let formData = $(this).serialize();
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            $.ajax({
                url: "{{ route('voters.store') }}",
                type: "POST",
                data: formData,
                success: function (response) {
                    let toastEl = document.getElementById('successToast');
                    let toast = new bootstrap.Toast(toastEl);
                    toast.show();

                    $('#voter-form')[0].reset();
                    $('#loadingSpinnerWrapper').css('display', 'none');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {
                            let inputField = $('input[name="' + key + '"]');
                            inputField.addClass('is-invalid');
                            inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                        });
                    }
                    $('#loadingSpinnerWrapper').css('display', 'none');
                }
            });
        });
    });
</script>
@endsection
