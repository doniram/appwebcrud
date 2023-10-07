<?php

include "funct/function.php";
$datas = tampilkan("SELECT * FROM karyawan, divisi, jabatan WHERE karyawan.id_jab = jabatan.id_jab && karyawan.id_div = divisi.id_div ORDER BY id ASC");
if (isset ($_POST["cari"])){
    $datas = cari($_POST["keyword"]);
}
;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>List Data Pegawai</title>
</head>
<body>
<?php include 'template/header.php';?>
<?php include 'template/menu.php';?>
<div class="wrapsearch">
    <form action="" method="post">
        <input class="inpsearch" type="text" name="keyword" placeholder="  Cari disini">
        <button class="btnsearch" type="submit" name="cari">cari</button>
    </form>
</div>
<div class="column right">
    <h3 class=" center">List Data Pegawai</h3><hr>
    <div style="overflow-x:auto;">
    <table>
    <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Tanggal Join</th>
        <th>Jabatan</th>
        <th>Divisi</th>
        <th>Gaji Pokok</th>
        <th>Tunjangan</th>
        <th>Aksi</th>

      </tr>
      <?php foreach ($datas as $data ):?>
      <tr>
        <td><?= $data["nip"];?></td>
        <td><?= $data["nama"];?></td>
        <td><?= $data["alamat"];?></td>
        <td><?= $data["email"];?></td>
        <td><?= $data["phone"];?></td>
        <td><?= $data["d_join"];?></td>
        <td><?= $data["jabatan"];?></td>
        <td><?= $data["divisi"];?></td>
        <td><?= $data["gapok"];?></td>
        <td><?= $data["tunjangan"];?></td>
        <td cellpadding="4"><button class="btnact"><a href="edit.php?id=<?= $data["id"];?>">Edit</a></button> |
        <button onclick="return confirm('yakiin');" class="btnact"><a href="hapus.php?id=<?= $data["id"];?>"  class="Z">Hapus</a></td>
      </tr>
      <?php endforeach ;?>
    </table>
    </div>
</div>
<?php include 'template/footer.php';?>

