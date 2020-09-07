<?php

    //include koneksi
    include('../query/koneksi.php');
    if(isset($_POST['deleteSaldoLimit'])){
        $id_saldo = $_POST['deleteSaldoLimit'];
        $result = mysqli_query($con,"CALL select_saldo_limit_by_id('".$id_saldo."')");
            while($row=mysqli_fetch_array($result)){
                $id_saldo=$row['id_saldo'];
            }
        mysqli_next_result($con);
     }
     
?>
<input type="hidden" class="form-control" value="<?= $id_saldo; ?>" name="idLimit">
Yakin Hapus Data ?