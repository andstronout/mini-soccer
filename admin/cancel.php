<?php
$id = $_GET["id"];
require "../config.php";
$hapus = sql("UPDATE pesanan SET `status`='Cancel' WHERE id_pesanan='$id'");
echo "
            <script>
            alert('Cancel Berhasil ');
            document.location.href='daftar_transaksi.php';
            </script>
            ";
