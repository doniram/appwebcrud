<?php

require 'funct/function.php';

$id = $_GET["id"];
$jabatan = tampilkan("SELECT * FROM jabatan ");
$divisi = tampilkan("SELECT * FROM divisi ");


$datas = tampilkan("SELECT * FROM karyawan, divisi, jabatan WHERE id=$id")[0];

if (isset ($_POST["submit"])){
    // var_dump($_POST); die();
    if(edit($_POST) > 0 ){
        echo "<script> alert('Data Berhasil diubah');
        document.location.href = 'listdata.php'</script>";
    }else{
        echo "<script> alert('Data Gagal diubah')</script>";
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
    <input type="hidden" name="id" value="<?= $datas["id"];?>" >
        <input class="inpdata" type="text" value="<?=$datas['nip']?>" name="nip" id=""  placeholder=" NIP" required>
        <input class="inpdata" type="text" value="<?=$datas['nama']?>" name="nama" id="" placeholder=" Nama">
        <input class="inpdata" type="text" value="<?=$datas['alamat']?>" name="alamat" id="" placeholder=" Alamat">
        <input class="inpdata" type="text" value="<?=$datas['email']?>" name="email" id="" placeholder=" Email">
        <input class="inpdata" type="text" value="<?=$datas['phone']?>" name="phone" id="" placeholder=" Phone">
        Tanggal Join : <input class="inpdata" value="<?=$datas['d_join']?>" type="date" name="d_join" id="">
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

