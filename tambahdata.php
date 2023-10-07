<?php

require 'funct/function.php';
$jabatan = tampilkan("SELECT * FROM jabatan");
$divisi = tampilkan("SELECT * FROM divisi");


if (isset ($_POST["submit"])){
    if(tambah($_POST) > 0 ){
        echo "<script> alert('Data Berhasil ditambahkan');
        document.location.href = 'listdata.php'</script>";
    }else{
        echo "<script> alert('Data Gagal ditambahkan')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tambah Data Pegawai</title>
</head>
<body>
<?php include 'template/header.php';?>
<?php include 'template/menu.php';?>

<div class="column right">
    <h3 class=" center">Tambah Data Pegawai</h3><hr>
    <form action="" method="post">
        <input class="inpdata" type="text" name="nip" id="" placeholder=" NIP" required>
        <input class="inpdata" type="text" name="nama" id="" placeholder=" Nama">
        <input class="inpdata" type="text" name="alamat" id="" placeholder=" Alamat">
        <input class="inpdata" type="text" name="email" id="" placeholder=" Email">
        <input class="inpdata" type="text" name="phone" id="" placeholder=" Phone">
        Tanggal Join : <input class="inpdata" type="date" name="d_join" id="">
        Jabatan :
        <select class="inpdata" name="id_jab" id="">
            <option>--</option>
            <?php foreach ($jabatan as $jab):?>
            <option value="<?=$jab['id_jab'] ;?>"><?= $jab['jabatan'];?></option>
            <?php endforeach?>
        </select>
        Divisi : 
        <select class="inpdata" name="id_div" id="">
            <option>--</option>
            <?php foreach ($divisi as $div):?>
            <option value="<?=$div['id_div'] ;?>"><?= $div['divisi'];?></option>
            <?php endforeach?>
        </select>
        <div class="btnwrap center">
        <button class="btn center" type="submit" name="submit">Submit</button>
        <button class="btn center" type="reset" name="reset">Reset</button>
        </div> 
        
       
    </form>
</div>


<?php include 'template/footer.php';?>

