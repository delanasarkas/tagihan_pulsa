<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['detailBukti'])){
        //id
        $tgl_setoran = $_POST['detailBukti'];
        //berdasarkan id pelanggan
        $result = mysqli_query($con, "CALL select_bukti_transfer_by_tgl('".$tgl_setoran."')");
        mysqli_next_result($con);
    }

?>
<h5 class="mb-1 mt-1">Kode Invoice Terkait</h5>
<p>
    <?php         
        while($data = mysqli_fetch_assoc($result)){
    ?>
    <i class="fas fa-check text-success fa-fw"></i> <?= substr($data['id_invoice'],0,7) ?>
    <?php } ?>
</p>