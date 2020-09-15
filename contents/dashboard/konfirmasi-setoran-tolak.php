<?php

    //session
    session_start();
    
    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['konfirmasiTolak'])){
    $id_sales = $_POST['konfirmasiTolak'];
    $result2 = mysqli_query($con,"CALL konfirmasi_terima_tolak('".$id_sales."')");
        while($row=mysqli_fetch_array($result2)){
            $id=$row['id_users'];
        }
        mysqli_next_result($con);
    }
?>
<input type="text" class="form-control form-control-user" id="id_users" name="id_users" value="<?= $id ?>" hidden>
<div class="form-group">
    <label for="keteranganditolak">Pesan Konfirmasi</label>
    <textarea class="form-control" id="keteranganditolak" name="keteranganditolak" rows="4"></textarea>
    <span class="error-text" id="errorPesan"></span>
</div>