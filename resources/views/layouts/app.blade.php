<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Barang</title>
    <!-- Memanggil Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .itemTable th:nth-child(1),
    .itemTable td:nth-child(1) {
        width: 150px; /* Lebar kolom untuk Nama Barang */
    }

    .itemTable th:nth-child(2),
    .itemTabletd:nth-child(2) {
        width: 100px; /* Lebar kolom untuk Lokasi Barang */
    }

    .itemTable th:nth-child(3),
    .itemTable td:nth-child(3) {
        width: 100px; /* Lebar kolom untuk Stok Barang */
    }

    .itemTable th:nth-child(4),
    .itemTable td:nth-child(4) {
        width: 150px; /* Lebar kolom untuk Kategori Barang */
    }

 .form-dynamic td:nth-child(1) select,
    .form-dynamic td:nth-child(2) input,
    .form-dynamic td:nth-child(3) input,
    .form-dynamic td:nth-child(4) input,
    .form-dynamic td:nth-child(5) input {
        width: 150px; /* Lebar untuk Nama Barang, Lokasi Barang, Stok Barang, Kategori Barang, dan Unit Barang */
    }

    .form-dynamic td:nth-child(6) input {
        width: 80px; /* Lebar untuk Quantity */
    }

    .form-dynamic td:nth-child(7) input {
        width: 150px; /* Lebar untuk Keterangan */
    }

    .form-dynamic td:nth-child(8) input,
    .form-dynamic td:nth-child(9) input {
        width: 100px; /* Lebar untuk Status dan Aksi */
    }

    #modalforminputbarang th:nth-child(1),
 #modalforminputbarang td:nth-child(1) {
    width: 100px; /* Lebar kolom untuk Nama Barang */
}

 #modalforminputbarang th:nth-child(2),
 #modalforminputbarang td:nth-child(2) input,
 #modalforminputbarang td:nth-child(3) input,
 #modalforminputbarang td:nth-child(4) input,
 #modalforminputbarang td:nth-child(5) input {
    width: 75px; /* Lebar kolom untuk Lokasi Barang, Stok Barang, Kategori Barang, dan Unit Barang */
}

 #modalforminputbarang td:nth-child(6) input {
    width: 80px; /* Lebar untuk Quantity */
}
 #modalforminputbarang td:nth-child(7) input {
    width: 100px; /* Lebar untuk Keterangan */
}

 #modalforminputbarang td:nth-child(8) input,
 #modalforminputbarang td:nth-child(9) input {
    width: 50px; /* Lebar untuk Status dan Aksi */
}
.modal-content th,
.modal-content td,
.modal-content input,
.modal-content select,
.modal-content button {
    font-size: 9px; /* Anda dapat menyesuaikan ukuran font sesuai kebutuhan */
}
    /* Sisanya sesuaikan dengan kebutuhan Anda */
#button-top {
    display: flex;
    justify-content: space-between;
}
.footer {
 position:fixed;
  bottom: 0;
  width: 100%;
  background-color: #f8f9fa;
  padding: 10px 0;
  text-align: center;
}

</style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Nama Aplikasi Anda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <!-- Add more navigation items as needed -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <span class="text-muted">PT SMM &copy; {{ date('Y') }}</span>
        </div>
    </footer>

    <script  type='text/javascript' charset='utf-8' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss' // Atur format date-time sesuai kebutuhan Anda
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   <script>
  // Pagination variables
  const itemsPerPage = 5;
  let currentPage = 1;
  let totalItems = 0;
  let totalPages = 0;

  // Search variables
  let searchQuery = '';

  // Function to fetch requests
  function fetchRequests() {
    let apiUrl = '/api/requests?page=' + currentPage + '&perPage=' + itemsPerPage + '&search=' + searchQuery;

    axios.get(apiUrl)
      .then(function(response) {
        // Handle success
        let requests = response.data.data;
        totalItems = response.data.total;
        totalPages = Math.ceil(totalItems / itemsPerPage);

        let tableBody = document.getElementById('requestsTable').getElementsByTagName('tbody')[0];
        tableBody.innerHTML = '';

        requests.forEach(function(request, index) {
          let row = tableBody.insertRow(index);
          row.innerHTML = `
            <th scope="row">${index + 1}</th>
            <td>${request.employee_nik}</td>
            <td>${request.employee_name}</td>
            <td>${request.department_name}</td>
            <td>${request.date_time}</td>
            <td>${request.jumlah_item}</td>
            <td>
               <button type="button" class="btn btn-primary" onclick="fetchDataAndShowModal(${request.id})">View</button>
               <button type="button" class="btn btn-warning" onclick="editRequest(${request.id})">Edit</button>
               <button type="button" class="btn btn-danger" onclick="deleteRequest(${request.id})">Delete</button>
            </td>
          `;
        });

        // Render pagination
        renderPagination();
      })
      .catch(function(error) {
        // Handle error
       // console.error('Error fetching data:', error);
      });
  }

  // Function to render pagination
  function renderPagination() {
    let pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
      let pageLink = document.createElement('li');
      pageLink.classList.add('page-item');
      pageLink.innerHTML = `<a class="page-link" href="#" onclick="changePage(${i})">${i}</a>`;

      if (i === currentPage) {
        pageLink.classList.add('active');
      }

      pagination.appendChild(pageLink);
    }
  }

  // Function to handle page change
  function changePage(page) {
    currentPage = page;
    fetchRequests();
  }

  // Function to handle search
  function search() {
    searchQuery = document.getElementById('searchInput').value;
    fetchRequests();
  }

  // Function to submit request
  function submitRequest() {
    // Code to submit request
  }

  // Function to edit request
  function editRequest(id) {
    // Code to edit request
  }

  // Function to delete request
  function deleteRequest(id) {
    // Code to delete request
  }

  function fetchDataAndShowModal(id) {
    // Ganti URL dengan URL API Anda
    const apiUrl = 'http://localhost:9000/api/requests/'+id;

    // Permintaan GET ke API
    axios.get(apiUrl)
      .then(function(response) {
        // Handle success
        const data = response.data;
        showDetailModal(data); // Menampilkan modal detail dengan data dari API
      })
      .catch(function(error) {
        // Handle error
        console.error('Error fetching data:', error);
      });
  }

  function showDetailModal(data) {
    // Set header data
    document.getElementById('dateTime').innerText = data.request[0].date_time;
    document.getElementById('employeeNik').innerText = data.request[0].employee_nik;
    document.getElementById('employeeName').innerText = data.request[0].employee_name;
    document.getElementById('departmentName').innerText = data.request[0].department_name;

    // Clear previous data
    document.getElementById('detailBody').innerHTML = '';

    // Loop through request_details data and populate modal body
    data.request_details.forEach(function(detail) {
      let row = document.createElement('tr');
      row.innerHTML = `
        <td>${detail.item_name}</td>
        <td>${detail.category_name}</td>
        <td>${detail.location_code}</td>
        <td>${detail.stock}</td>
        <td>${detail.description}</td>
        <td>${detail.qty}</td>
        <td>${detail.status ? 'Tersedia' : 'Tidak Tersedia'}</td>
      `;
      document.getElementById('detailBody').appendChild(row);
    });

    // Show modal
    var myModal = new bootstrap.Modal(document.getElementById('detailModal'));
    myModal.show();
  }
</script>

<script>
  // Fungsi untuk menambah field untuk barang baru
  function addNewItem() {
    var newItemHtml = `
      <div class="mb-3 item">
        <label for="namaBarangInput" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="namaBarangInput" placeholder="Nama Barang" autocomplete="off">
      </div>
      <div class="mb-3 item">
        <label for="lokasiBarangInput" class="form-label">Lokasi Barang</label>
        <input type="text" class="form-control" id="lokasiBarangInput" readonly>
      </div>
      <div class="mb-3 item">
        <label for="stokBarangInput" class="form-label">Stok Barang</label>
        <input type="text" class="form-control" id="stokBarangInput" readonly>
      </div>
      <div class="mb-3 item">
        <label for="kategoriBarangInput" class="form-label">Kategori Barang</label>
        <input type="text" class="form-control" id="kategoriBarangInput" readonly>
      </div>
      <div class="mb-3 item">
        <label for="unitBarangInput" class="form-label">Unit Barang</label>
        <input type="text" class="form-control" id="unitBarangInput" readonly>
      </div>
      <div class="mb-3 item">
        <label for="quantityInput" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantityInput" min="1" required>
      </div>
      <div class="mb-3 item">
        <label for="keteranganInput" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keteranganInput">
      </div>
      <div class="mb-3 item">
        <label for="statusInput" class="form-label">Status</label>
        <input type="text" class="form-control" id="statusInput" readonly>
      </div>
    `;
    document.getElementById('itemsContainer').insertAdjacentHTML('beforeend', newItemHtml);
  }

  // Fungsi untuk menentukan status berdasarkan kuantitas permintaan dan stok barang
  function calculateStatus() {
    var quantity = document.getElementById('quantityInput').value;
    var stokBarang = document.getElementById('stokBarangInput').value;
    var statusInput = document.getElementById('statusInput');

    if (parseInt(quantity) <= parseInt(stokBarang)) {
      statusInput.value = 'Tersedia';
    } else {
      statusInput.value = 'Tidak Tersedia';
    }
  }

  // Event listener untuk memanggil calculateStatus saat nilai quantityInput berubah
  // document.getElementById('quantityInput').addEventListener('change', calculateStatus);
</script>

<script>
  // Fetch employee data by employee ID
  function fetchEmployeeData() {
    var employeeId = document.getElementById('nikSelect').value;
    if (employeeId === '') return; // Do nothing if employee ID is not selected

    // Call API to get employee data by employee ID
    fetch(`http://localhost:9000/api/employee/${employeeId}`)
      .then(response => response.json())
      .then(data => {
        // Populate employee name and department name fields
        document.getElementById('employeeNameInput').value = data.data.employee_name;
        document.getElementById('departmentNameInput').value = data.data.department_name;
      })
      .catch(error => console.error('Error fetching employee data:', error));
  }

  // Fetch and populate employee ID dropdown options
  function fetchEmployeeIdOptions() {
    // Call API to get list of employee IDs
    fetch('http://localhost:9000/api/employees')
      .then(response => response.json())
      .then(data => {
        // Populate employee ID dropdown options
        var employeeIdSelect = document.getElementById('nikSelect');
        data.data.forEach(employee => {
          var option = document.createElement('option');
          option.value = employee.id;
          option.textContent = employee.nik;
          employeeIdSelect.appendChild(option);
        });
      })
      .catch(error => console.error('Error fetching employee ID options:', error));
  }

  // Call fetchEmployeeIdOptions function when the page loads

  // Inisialisasi nomor urut untuk item
  var itemCounter = 1;

  // Ketika tombol "Tambah Permintaan" diklik
  $('#btnTambahPermintaan').click(function() {
    // Tampilkan modal
    $('#modalTambahPermintaan').modal('show');
  });

// Tambahkan event listener untuk tombol "Tambah Barang"
$('#btnTambahItem').click(function() {
    // Tambahkan baris baru ke tabel
    var newRow = `
        <tr id="itemRow-${itemCounter}">
            <td>
                <select class="form-select namaBarang" name="namaBarang[]" onchange="fetchItemData()">
                    <option value="" selected disabled>Pilih Nama Barang</option>
                    <!-- Opsi-opsi barang akan ditambahkan di sini menggunakan JavaScript -->
                </select>
                <input type="hidden" class="idBarang" name="idBarang[]">
            </td>
            <td><input type="text" class="form-control lokasiBarang" name="lokasiBarang[]" placeholder="Lokasi Barang" readonly></td>
            <td><input type="text" class="form-control stokBarang" name="stokBarang[]" placeholder="Stok Barang" readonly></td>
            <td><input type="text" class="form-control kategoriBarang" name="kategoriBarang[]" placeholder="Kategori Barang" readonly></td>
            <td><input type="text" class="form-control unitBarang" name="unitBarang[]" placeholder="Unit Barang" readonly></td>
            <td style="min-width: 80px;"><input type="number" class="form-control quantity" name="quantity[]" min="1" required></td>
            <td><input type="text" class="form-control keterangan" name="keterangan[]" placeholder="Keterangan"></td>
            <td><input type="text" class="form-control status" name="status[]" placeholder="Status" readonly></td>
            <td><button type="button" class="btn btn-danger btnHapusItem" data-id="${itemCounter}">Hapus</button></td>
        </tr>
    `;
    $('#itemList').append(newRow);
    itemCounter++; // Tambahkan 1 ke nomor urut item

    // Panggil fetchItemData() untuk mengisi dropdown dengan data barang
    fetchItemData();
});


// Fungsi untuk mengambil dan menambahkan data barang ke dropdown
function fetchItemData() {
     fetch('http://localhost:9000/api/items')
        .then(response => response.json())
        .then(data => {
            // Ambil semua elemen dropdown namaBarang
            var dropdowns = document.querySelectorAll('.namaBarang');

            // Iterasi melalui setiap dropdown dan tambahkan opsi-opsi barang
            dropdowns.forEach(dropdown => {
                // Hapus opsi-opsi yang ada sebelumnya
                dropdown.innerHTML = '';

                // Buat opsi-opsi baru untuk setiap barang
                data.data.forEach(item => {
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    dropdown.appendChild(option);
                });
            });
        })
        .catch(error => console.error('Error fetching item data:', error));

}


  // Ketika tombol "Hapus" pada item diklik
  $(document).on('click', '.btnHapusItem', function() {
    var itemId = $(this).data('id');
    $('#itemRow-' + itemId).remove(); // Hapus baris dari tabel
  });

  // Fungsi untuk mengisi data barang setelah memilih dari dropdown
  $(document).on('change', '.namaBarang', function() {
    var selectedRow = $(this).closest('tr');
    var namaBarang = $(this).val();

    axios.get('http://localhost:9000/api/items')
      .then(response => {
        var items = response.data.data;
        var selectOptions = '';

        // Buat opsi-opsi untuk setiap barang
        items.forEach(item => {
          selectOptions += `<option value="${item.name}" data-id="${item.id}" data-location="${item.location_code}" data-stock="${item.stock}" data-category="${item.category}" data-unit="${item.unit}">${item.name}</option>`;
        });

        // Tambahkan opsi-opsi ke dalam dropdown select
        $('.namaBarang').html(selectOptions);

        // Tambahkan event listener untuk mengisi data barang saat dipilih
        $('.namaBarang').change(function() {
          var selectedItem = $(this).find(':selected');
          var selectedRow = $(this).closest('tr');

          // Isi data barang ke dalam input tersembunyi
          selectedRow.find('.idBarang').val(selectedItem.data('id'));
          selectedRow.find('.lokasiBarang').val(selectedItem.data('location'));
          selectedRow.find('.stokBarang').val(selectedItem.data('stock'));
          selectedRow.find('.kategoriBarang').val(selectedItem.data('category'));
          selectedRow.find('.unitBarang').val(selectedItem.data('unit'));
          calculateStatus(selectedRow);
        });
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  });

  // Fungsi untuk menghitung status berdasarkan kuantitas permintaan dan stok barang
  function calculateStatus(row) {
    var quantity = row.find('.quantity').val();
    var stokBarang = row.find('.stokBarang').val();
    var statusInput = row.find('.status');

    if (parseInt(quantity) <= parseInt(stokBarang)) {
      statusInput.val('Tersedia');
    } else {
      statusInput.val('Tidak Tersedia');
    }
  }

  // Event listener untuk memanggil calculateStatus saat nilai quantityInput berubah
  $(document).on('change', '.quantity', function() {
    var row = $(this).closest('tr');
    calculateStatus(row);
  });
    fetchRequests();
    window.addEventListener('click', fetchEmployeeIdOptions);
window.addEventListener('click', fetchItemData);
</script>

</body>

</html>
