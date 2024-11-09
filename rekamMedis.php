<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Pasien dalam Modal</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- side bar -->
    <div class="sidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="img/logo.png" width="50" height="50"></img>
            </div>
            <div class="sidebar-brand-text">Menu</div>
        </a>
        <hr class="mx-auto" style="max-width: 100%; width: 95%; margin-top: 15px;">
        <ul class="list-unstyled container">

        <li class="side-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Home</span></a>
            </li>
        <li class="side-item">
            <a class="nav-link" href="pasien.php">
                <i class="fas fa-user fa"></i>
                <span>Pasien</span></a>
        </li>
        <li class="side-item">
            <a class="nav-link" href="dokter.php">
                <i class="fas fa-user fa"></i>
                <span>Dokter</span></a>
        </li>

        <li class="side-item">
            <a class="nav-link" href="obat.php">
                <i class="fas fa-pills fa"></i>
                <span>Obat</span></a>
        </li>

        <li class="side-item">
            <a class="nav-link" href="rekamMedis.php">
                <i class="fas fa-user fa"></i>
                <span>Rekam Medis</span></a>
        </li>

        </ul>
        <hr class="mx-auto" style="max-width: 100%; width: 95%; margin-top: 15px;">

    </div>



    <script>
        // Script to handle sidebar collapse
        const sidebar = document.querySelector('.sidebar');
        const content = document.querySelector('.content');
        document.querySelector('.navbar-toggler').addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        });
    </script>

    <!-- end sidebar -->

    <!-- NAVDASH -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
    </nav>
    <!-- END NAVBAR -->

    <div class="content">
        <div class="container-fluid">
            <div style="display: flex;">
                <div>
                    <h2>Dashboard Rekam Medis Pasien</h2>
                    <p class="subtitle">Electronic Medical
                        Record</p>
                </div>
                <div class="mt-1" style="margin-left: auto;">

                </div>
            </div>
            <div class="container mt-5 text-center">
                <!-- Button untuk membuka modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientModal">
                    Buka Form Data Pasien
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="patientModalLabel">Form Data Pasien</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Data Pasien -->
                            <form id="patientForm">
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="birthdate">Tanggal Lahir:</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
    </div>

    <div class="form-group">
        <label for="address">Alamat:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>

    <div class="form-group">
        <label for="phone">Nomor HP:</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>

    <div class="form-group">
        <label for="gender">Gender:</label>
        <select class="form-control" id="gender" name="gender" required>
            <option value="" disabled selected>Pilih Gender</option>
            <option value="L">Pria</option>
            <option value="P">Wanita</option>
        </select>
    </div>

    <div class="form-group">
        <label for="complaint">Keluhan:</label>
        <textarea class="form-control" id="complaint" name="complaint" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="visitDate">Tanggal Kunjungan:</label>
        <input type="date" class="form-control" id="visitDate" name="visitDate" required>
    </div>

    <button type="button" class="btn btn-primary" onclick="displayData()">Submit</button>
</form>

                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <h4 class="text-center">Data Pasien</h4>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Gender</th>
                        <th>Keluhan</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td id="displayName"></td>
                        <td id="displayBirthdate"></td>
                        <td id="displayAddress"></td>
                        <td id="displayPhone"></td>
                        <td id="displayGender"></td>
                        <td id="displayComplaint"></td>
                        <td id="displayVisitDate"></td>
                        <td>
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script>
            function displayData() {
                alert("Data pasien berhasil disubmit!");
            }
            function displayData() {
                document.getElementById("displayName").innerText = document.getElementById("name").value;
                document.getElementById("displayBirthdate").innerText = document.getElementById("birthdate").value;
                document.getElementById("displayAddress").innerText = document.getElementById("address").value;
                document.getElementById("displayPhone").innerText = document.getElementById("phone").value;
                document.getElementById("displayGender").innerText = document.getElementById("gender").value;
                document.getElementById("displayComplaint").innerText = document.getElementById("complaint").value;
                document.getElementById("displayVisitDate").innerText = document.getElementById("visitDate").value;
            }

            function displayData() {
    const formData = new FormData(document.getElementById('patientForm'));

    fetch('main.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Tampilkan pesan sukses atau error dari PHP
        document.getElementById('patientForm').reset(); // Reset form setelah submit
        $('#patientModal').modal('hide'); // Tutup modal setelah submit
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


        </script>

        

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</php>