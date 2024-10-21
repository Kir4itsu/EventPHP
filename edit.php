<?php
  include "connection.php";
  $id = "";
  $nama_event = "";
  $tanggal = "";
  $waktu = "";
  $lokasi = "";
  $deskripsi = "";

  if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(!isset($_GET['id'])){
      header("location: home.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if(!$row){
      header("location: home.php");
      exit;
    }
    $nama_event = $row["nama_event"];
    $tanggal = $row["tanggal"];
    $waktu = $row["waktu"];
    $lokasi = $row["lokasi"];
    $deskripsi = $row["deskripsi"];
  }
  else {
    $id = $_POST["id"];
    $nama_event = $_POST["nama_event"];
    $tanggal = $_POST["tanggal"];
    $waktu = $_POST["waktu"];
    $lokasi = $_POST["lokasi"];
    $deskripsi = $_POST["deskripsi"];

    $sql = "UPDATE events SET nama_event=?, tanggal=?, waktu=?, lokasi=?, deskripsi=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nama_event, $tanggal, $waktu, $lokasi, $deskripsi, $id);
    $stmt->execute();
    
    header("location: home.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
 <title>Edit Event</title>
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
              <a class="nav-link" href="create.php">Tambah Event Baru</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 <form method="post">
 <br><br><div class="card">
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">Edit Event</h1>
 </div><br>
 <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
 <label> Nama Event: </label>
 <input type="text" name="nama_event" value="<?php echo $nama_event; ?>" class="form-control" required> <br>
 <label> Tanggal: </label>
 <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" class="form-control" required> <br>
 <label> Waktu: </label>
 <input type="time" name="waktu" value="<?php echo $waktu; ?>" class="form-control" required> <br>
 <label> Lokasi: </label>
 <input type="text" name="lokasi" value="<?php echo $lokasi; ?>" class="form-control" required> <br>
 <label> Deskripsi: </label>
 <textarea name="deskripsi" class="form-control" rows="4" required><?php echo $deskripsi; ?></textarea> <br>
 <button class="btn btn-success" type="submit" name="submit"> Simpan Perubahan </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="home.php"> Batal </a><br>
 </div>
 </form>
 </div>
</body>
</html>