<?php
$id = $_GET["id"];
require "../config.php";
$hapus = sql("UPDATE sewa SET
`status`='Finished' WHERE id_sewa='$id'");
echo "
            <script>
            alert('Produk berhasil Di Update');
            document.location.href='daftar_produk.php';
            </script>
            ";
