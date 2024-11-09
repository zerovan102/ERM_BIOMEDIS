<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
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
                <a class="nav-link" href="">
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
                    <h2>Dashboard</h2>
                    <p class="subtitle">Electronic Medical
                        Record</p>
                </div>
                <div class="mt-1" style="margin-left: auto;">

                </div>
            </div>
           

       

            <!-- Table -->

            <div class="table-responsive">
                <table class="table table-bordered">
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
                    </tr>
                </tbody>
            </table>
             <div class="tableDoctor">
             <h4 class="text-center">Data Dokter</h4>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Ruangan</th>
                        <th>Nomor HP</th>
                        <th>Jam Kerja</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td id="displayName"></td>
                        <td id="displaySpeciality"></td>
                        <td id="displayRoom"></td>
                        <td id="displayPhone"></td>
                        <td id="displayGender"></td>
                        <td id="displayWorkTime"></td>
                    </tr>
                </tbody>
            </table>
             </div>   

            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

</body>