<?php

    //session
    session_start();
    
    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['konfirmasiTerima'])){
    $id_sales = $_POST['konfirmasiTerima'];
    $result2 = mysqli_query($con,"CALL konfirmasi_terima_tolak('".$id_sales."')");
        while($row=mysqli_fetch_array($result2)){
            $id=$row['id_users'];
        }
        mysqli_next_result($con);
    }
?>
<input type="text" class="form-control form-control-user" id="id_users" name="id_users" value="<?= $id ?>" hidden>
<h4 class="mt-0">
    Anda Yakin terima setoran ?
</h4>