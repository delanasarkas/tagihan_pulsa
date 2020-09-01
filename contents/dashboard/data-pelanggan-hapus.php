<?php

    //include koneksi
    include('../query/koneksi.php');
    if(isset($_POST['deletePelanggan'])){
        $id_pelanggan = $_POST['deletePelanggan'];
        $result = mysqli_query($con,"CALL select_pelanggan_by_id('".$id_pelanggan."')");
            while($row=mysqli_fetch_array($result)){
                $id=$row['id_pelanggan'];
                $nama_pelanggan=$row['nama_pelanggan'];
            }
        mysqli_next_result($con);
     }
     
?>
<input type="text" class="form-control" value="<?= $id; ?>" name="id_pelanggan2" hidden>
Yakin Hapus Data <strong><?= $nama_pelanggan; ?></strong> ?