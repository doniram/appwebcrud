<?php

require "funct/function.php";

    $id = $_GET["id"];
if (hapus($id) > 0){
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href= 'listdata.php';
        </script>";
}else{
    "<script>
            alert('Data gagal dihapus');
        </script>";
}
?>