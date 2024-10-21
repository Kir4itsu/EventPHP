<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $nama_event = $_POST['nama_event'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $lokasi = $_POST['lokasi'];
        $deskripsi = $_POST['deskripsi'];
        
        $q = "INSERT INTO `events` (`nama_event`, `tanggal`, `waktu`, `lokasi`, `deskripsi`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($q);
        $stmt->bind_param("sssss", $nama_event, $tanggal, $waktu, $lokasi, $deskripsi);
        $stmt->execute();
        
        if($stmt->affected_rows > 0){
            header("Location: home.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Tambah Event Baru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Manajemen Event Komunitas</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="create.php">Tambah Event Baru</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 <form method="post">
 <br><br><div class="card">
 <div class="card-header bg-primary">
 <h1 class="text-white text-center">Tambah Event Baru</h1>
 </div><br>
 <label> Nama Event: </label>
 <input type="text" name="nama_event" class="form-control" required> <br>
 <label> Tanggal: </label>
 <input type="date" name="tanggal" class="form-control" required> <br>
 <label> Waktu: </label>
 <input type="time" name="waktu" class="form-control" required> <br>
 <label> Lokasi: </label>
 <input type="text" name="lokasi" class="form-control" required> <br>
 <label> Deskripsi: </label>
 <textarea name="deskripsi" class="form-control" rows="4" required></textarea> <br>
 <button class="btn btn-success" type="submit" name="submit"> Simpan </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="home.php"> Batal </a><br>
 </div>
 </form>
 </div>
</body>
</html>