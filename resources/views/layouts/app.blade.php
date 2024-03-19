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
        width: 150px;
    }

    .itemTable th:nth-child(2),
    .itemTabletd:nth-child(2) {
        width: 75px;
    }

    .itemTable th:nth-child(3),
    .itemTable td:nth-child(3) {
        width: 50px;
    }

    .itemTable th:nth-child(4),
    .itemTable td:nth-child(4) {
        width: 75px;
    }

 .form-dynamic td:nth-child(1) select,
    .form-dynamic td:nth-child(2) input,
    .form-dynamic td:nth-child(3) input,
    .form-dynamic td:nth-child(4) input,
    .form-dynamic td:nth-child(5) input {
        width: 150px;
    }

    .form-dynamic td:nth-child(6) input {
        width: 70px;
    }

    .form-dynamic td:nth-child(7) input {
        width: 100px;
    }

    .form-dynamic td:nth-child(8) input,
    .form-dynamic td:nth-child(9) input {
        width: 100px;
    }

    #modalforminputbarang th:nth-child(1),
    #modalforminputbarang td:nth-child(1) {
      width: 100px;
  }

 #modalforminputbarang th:nth-child(2),
 #modalforminputbarang td:nth-child(2) input,
 #modalforminputbarang td:nth-child(3) input,
 #modalforminputbarang td:nth-child(4) input,
 #modalforminputbarang td:nth-child(5) input {
    width: 75px;
}

 #modalforminputbarang td:nth-child(6) input {
    width: 75px;
}
 #modalforminputbarang td:nth-child(7) input {
    width: 100px;
}

 #modalforminputbarang td:nth-child(8) input{
   width: 80px;
 }
 #modalforminputbarang td:nth-child(9) input {
    width: 60px;
}
.modal-content th,
.modal-content td,
.modal-content input,
.modal-content select,
.modal-content button {
    font-size: 9px; 
}
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
            <a class="navbar-brand" href="{{ url('/') }}">PT SMM</a>
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
        <td>${detail.status}</td>
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
        <input type="number" class="form-control quantity" id="quantityInput" min="1" required>
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
  /**function calculateStatus() {
    var quantity = document.getElementById('quantityInput').value;
    var stokBarang = document.getElementById('stokBarangInput').value;
    var statusInput = document.getElementById('statusInput');

    if (parseInt(quantity) <= parseInt(stokBarang)) {
      statusInput.value = 'tersedia';
    } else if(parseInt(quantity) > parseInt(stokBarang)){
      statusInput.value = 'sebagian';
    } else {
      statusInput.value = 'kosong';
    }
  }*/
</script>
<script>
  function fetchEmployeeData() {
    var employeeId = document.getElementById('nikSelect').value;
    if (employeeId === '') return;
    fetch(`http://localhost:9000/api/employee/${employeeId}`)
      .then(response => response.json())
      .then(data => {
        document.getElementById('employeeNameInput').value = data.data.employee_name;
        document.getElementById('departmentNameInput').value = data.data.department_name;
      })
      .catch(error => console.error('Error fetching employee data:', error));
  }

  function fetchEmployeeIdOptions() {
    fetch('http://localhost:9000/api/employees')
      .then(response => response.json())
      .then(data => {
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

  var itemCounter = 1;

  // Ketika tombol "Tambah Permintaan" diklik
  $('#btnTambahPermintaan').click(function() {
    $('#modalTambahPermintaan').modal('show');
  });

$('#btnTambahItem').click(function() {
    var newRow = `
        <tr id="itemRow-${itemCounter}">
            <td>
                <select class="form-select namaBarang" name="namaBarang[]" onchange="fetchItemData()">
                    <option value="" selected disabled>Pilih Nama Barang</option>
                    <!-- Opsi-opsi barang akan ditambahkan di sini menggunakan JavaScript -->
                </select>
                <input type="hidden" class="idBarang" name="idBarang[]">
            </td>
            <td><input type="text" class="form-control lokasiBarang" name="lokasiBarang[]" placeholder="Lokasi" readonly></td>
            <td><input type="text" class="form-control stokBarang" name="stokBarang[]" placeholder="Stok" readonly></td>
            <td><input type="text" class="form-control kategoriBarang" name="kategoriBarang[]" placeholder="Kategori" readonly></td>
            <td><input type="text" class="form-control unitBarang" name="unitBarang[]" placeholder="Unit" readonly></td>
            <td style="min-width: 80px;"><input type="number" class="form-control quantity" name="quantity[]" min="1" required></td>
            <td><input type="text" class="form-control keterangan" name="keterangan[]" placeholder="Keterangan"></td>
            <td><input type="text" class="form-control status" name="status[]" placeholder="Status" readonly></td>
            <td><button type="button" class="btn btn-sm btn-danger btnHapusItem" data-id="${itemCounter}">Hapus</button></td>
        </tr>
    `;
    $('#itemList').append(newRow);
    itemCounter++;

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
                    option.textContent = item.item_name;
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
          selectOptions += `<option value="${item.item_name}" data-id="${item.id}" data-location="${item.location_code}" data-stock="${item.stock}" data-category="${item.category_name}" data-unit="${item.unit}">${item.item_name}</option>`;
        });

        // Tambahkan opsi-opsi ke dalam dropdown select
        $('.namaBarang').html(selectOptions);

        // Tambahkan event listener untuk mengisi data barang saat dipilih
        $('.namaBarang').change(function() {
          var selectedItem = $(this).find(':selected');
          var selectedRow = $(this).closest('tr');
          selectedRow.find('.idBarang').val(selectedItem.data('id'));
          selectedRow.find('.lokasiBarang').val(selectedItem.data('location'));
          selectedRow.find('.stokBarang').val(selectedItem.data('stock'));
          selectedRow.find('.kategoriBarang').val(selectedItem.data('category_name'));
          selectedRow.find('.unitBarang').val(selectedItem.data('unit'));
          selectedRow.find('.quantity').val(parseInt(1));
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
    if (parseInt(quantity) <= parseInt(stokBarang)) {
      row.find('.status').val('tersedia');
    } else if(parseInt(quantity) > parseInt(stokBarang)){
       row.find('.status').val('sebagian');
    } else {
       row.find('.status').val('kosong');
    }
  }

  function submitRequest(){
      var confirmation = confirm('Apakah Anda yakin ingin mengirim permintaan?');
    
    // Jika pengguna mengonfirmasi, kirim permintaan ke server
    if (confirmation) {
        // Ambil nilai-nilai dari formulir
        var nik = document.getElementById('nikSelect').value;
        var employeeName = document.getElementById('employeeNameInput').value;
        var departmentName = document.getElementById('departmentNameInput').value;

        // Siapkan data barang
        var items = [];
        var itemRows = document.querySelectorAll('#itemList tr');
        itemRows.forEach(function(row) {
            var item = {
                item_id: row.querySelector('.idBarang').value,
                qty: row.querySelector('.quantity').value,
                description: row.querySelector('.keterangan').value,
                status: row.querySelector('.status').value
            };
            items.push(item);
        });

        // Siapkan data untuk dikirim ke server
        var requestData = {
            employee_id: nik,
            employeeName: employeeName,
            departmentName: departmentName,
            details: items
        };
        console.log('requestData' + JSON.stringify(requestData));
        // Kirim data ke server menggunakan AJAX
        fetch('http://localhost:9000/api/request', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(requestData)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response from server
            // Tampilkan alert sukses
            alert('Permintaan berhasil dikirim!');
        })
        .catch(error => {
            // Handle any errors
            console.error('Error:', error);
        });
    } else {
        // Jika pengguna membatalkan, tidak ada tindakan yang diambil
        console.log('Permintaan dibatalkan');
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
