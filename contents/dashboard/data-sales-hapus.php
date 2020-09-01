<?php

    //include koneksi
    include('../query/koneksi.php');
    if(isset($_POST['deleteSales'])){
        $id_sales = $_POST['deleteSales'];
        $result = mysqli_query($con,"CALL select_sales_by_id('".$id_sales."')");
            while($row=mysqli_fetch_array($result)){
                $id=$row['id_users'];
                $nama_depan=$row['nama_depan'];
                $nama_belakang=$row['nama_belakang'];
            }
        mysqli_next_result($con);
     }
     
?>
<input type="text" class="form-control" value="<?= $id; ?>" name="id_sales2" hidden>
Yakin Hapus Data <strong><?= $nama_depan; ?></strong> ?