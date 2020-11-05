<?php 
$con = mysqli_connect ('localhost', 'root','','db_kode');


$no = mysqli_query($con, "SELECT kode_barang FROM barang ORDER BY kode_barang DESC");
$result = mysqli_query($con, "SELECT * FROM barang ") or die (mysqli_error($con));;

$kd_barang = mysqli_fetch_array($no);
$kode = $kd_barang['kode_barang'];

// BRG001
// 012345
$urut = substr($kode, 3, 3);
$tambah = (int) $urut + 1 ;
if (strlen($tambah) == 1) {
  $format = "BRG"."00".$tambah;
} else if (strlen($tambah) == 2) {
  $format = "BRG"."0".$tambah;
}else{
  $format = "BRG".$tambah;
}



// proses
if (isset($_POST['submit'])) {
  $no_urut = $_POST['no_urut'];
  $nama = $_POST['nama'];

  mysqli_query($con, "INSERT INTO barang VALUES ('$no_urut','$nama')");

  header("location:index.php?success");
}

 ?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<body>
  <h1>Hello, world!</h1>
  <div class="container">
    <?php  
    if (isset($_GET['success'])) {
      echo '<h4>Data berhasil disimpan !</h4>';
    }
    ?>
    <form method="post" action="">
      <div class="form-group">
        <label for="kd_brg">kode barang</label>
        <input type="text" name="no_urut" class="form-control" value="<?php echo $format; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="nm_brg">nama barang</label>
        <input type="text" name="nama" class="form-control" id="">
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>