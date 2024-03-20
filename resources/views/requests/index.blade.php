@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5 mb-4">List Permintaan Barang</h1>

<div class="flex" id="button-top">
  <div class="col-md-4">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari nama karyawan.." aria-label="Cari" aria-describedby="basic-addon2" id="searchInput">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="searchButton" onclick="search()">Cari</button>
        </div>
    </div>
  </div>
  <div class="col-md-4">
        <!-- Button for making request -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal"><i class="fas fa-plus"></i> Permintaan Barang</button>
  </div>
</div>

    <table class="table" id="requestsTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Departement</th>
                <th scope="col">Tanggal Permintaan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination" id="pagination">
        </ul>
    </nav>


</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Permintaan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Tanggal Permintaan:</strong> <span id="dateTime"></span>
                    </div>
                    <div class="col-md-6">
                        <strong>NIK:</strong> <span id="employeeNik"></span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama:</strong> <span id="employeeName"></span>
                    </div>
                    <div class="col-md-6">
                        <strong>Departmen:</strong> <span id="departmentName"></span>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">kategori</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="detailBody">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-xl" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-75"> 
        <div class="modal-content" id="modalforminputbarang">
            <div class="modal-header">
                <h5 class="modal-title" id="requestModalLabel">Formulir Permintaan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nikSelect" class="form-label-sm">NIK</label>
                            <select class="form-select" id="nikSelect" onchange="fetchEmployeeData()">
                                <option value="">Pilih NIK</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3 ">
                            <label for="employeeNameInput" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="employeeNameInput" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="departmentNameInput" class="form-label">Departemen</label>
                            <input type="text" class="form-control" id="departmentNameInput" readonly>
                        </div>
                    </div>
                </div>
                    <table class="table-responsive nowrap itemTable form-dynamic">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Lokasi</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Unit</th>
                                <th>Qty</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="itemList">
                            <!-- Isi formulir disini -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" id="btnTambahItem"><i class="fas fa-plus"></i> Barang</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary"  id="submitRequest" onclick="submitRequest()">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection
