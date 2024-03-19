<!-- resources/views/create-request.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5 mb-4">Form Permintaan Barang</h1>

    <form id="requestForm" action="" method="POST">
        @csrf
      <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nikSelect" class="form-label">NIK</label>
                            <select class="form-select" id="nikSelect" onchange="fetchEmployeeData()">
                                <option value="">Pilih NIK</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3 ">
                            <label for="employeeNameInput" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="employeeNameInput" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="departmentNameInput" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="departmentNameInput" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="datetimepicker">Date Time</label>
                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker"/>
                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

        <!-- Dynamic item list table -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Lokasi Barang</th>
                        <th>Stok Barang</th>
                        <th>Kategori Barang</th>
                        <th>Unit Barang</th>
                        <th>Quantity</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="itemList">
                    <!-- Isi formulir disini -->
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-primary" id="btnTambahItem">Tambah Barang</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@push('scripts')
<script>

    // Function to handle form submission
    $('#requestForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Serialize form data
        var formData = $(this).serialize();

        // Send AJAX request to API endpoint
        $.ajax({
            url: 'http:localhost:9000/api/request/store', // Adjust the route to match your API endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log(response);
                // Redirect or show success message as needed
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                // Show error message to the user
            }
        });
    });
  
</script>
@endpush
