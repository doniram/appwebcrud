<?php

//fungsi koneksi ke engine database
$server="localhost";
$user="root";
$pass="";
$dbase="employee";
$conn = mysqli_connect($server,$user,$pass,$dbase);
if(!$conn){
    die("konesi ke database engine gagal");
}else{
    echo "";
}


//tampilkan data
function tampilkan($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
        }
        return $rows;
}

//fungsi tambah data
function tambah($data){
        global $conn;
        $nip  =htmlspecialchars($data["nip"]);
        $nama  =htmlspecialchars($data["nama"]);
        $alamat =htmlspecialchars($data["alamat"]);
        $email =htmlspecialchars($data["email"]);       
        $phone =htmlspecialchars($data["phone"]);       
        $djoin =htmlspecialchars($data["d_join"]);       
        $idjab =htmlspecialchars($data["id_jab"]);       
        $iddiv =htmlspecialchars($data["id_div"]);    
       
        
        $query= "INSERT INTO karyawan VALUES('','$nip','$nama','$alamat','$email', '$phone','$djoin','$idjab','$iddiv',CURRENT_TIMESTAMP())";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }



//fungsi haopus data
function hapus($data){
    global $conn;
    $sql = "DELETE FROM karyawan WHERE id=$data";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

//fungsi edit
function edit($data){
    global $conn;
    $id  =htmlspecialchars($data["id"]);
    $nip  =htmlspecialchars($data["nip"]);
    $nama  =htmlspecialchars($data["nama"]);
    $alamat =htmlspecialchars($data["alamat"]);
    $email =htmlspecialchars($data["email"]);       
    $phone =htmlspecialchars($data["phone"]);       
    $djoin =htmlspecialchars($data["d_join"]);       
    $idjab =htmlspecialchars($data["id_jab"]);       
    $iddiv =htmlspecialchars($data["id_div"]); 

    $query= "UPDATE karyawan SET nip='$nip', nama='$nama', alamat='$alamat', email='$email', phone='$phone', d_join='$djoin', id_jab='$idjab', id_div='$iddiv' WHERE id=$id ";
    mysqli_query($conn,$query);

                                                                            
    return mysqli_affected_rows($conn);
}

//fungsi cari
function cari($keyword){
    $query = "SELECT * FROM karyawan, divisi, jabatan WHERE karyawan.id_jab = jabatan.id_jab && karyawan.id_div = divisi.id_div &&
    nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR nip LIKE '%$keyword%'
     "; //penggunaan % di depan agar hasil pencarian kata kunci pertama diketikan tampil , tanda % di belakang '%$katakunci, agar pencarian kata bekakang tampil

    return tampilkan($query);
}


function register($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));//stipsslalshes dan strtolower tidak mengizinkan user untuk memasukan backslash dan mengkonversi semua menjadi hurug kecil
    $password = mysqli_real_escape_string($conn, $data["password"]);//nysqli real escape untuk memberikan izin user menggunakan karakter tertentu seperti blackslash
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah dipakai
    $result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('username sudah digunakan')</script>";
        return false;
    }

    //cek konfirmasi password
    if ( $password !== $password2){
        echo "<script>alert('konfirm password tidak sesuai')</script>";
        return false;
    }

    //eckripsi passwprd
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan user kedalam database
    $query = "INSERT INTO users VALUES('','$username','$password',CURRENT_TIMESTAMP())";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

}
?>