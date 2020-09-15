<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['detailKonfirmasi'])){
        //id
        $tgl_setoran = $_POST['detailKonfirmasi'];
        //berdasarkan id pelanggan
        $result = mysqli_query($con, "CALL select_bukti_transfer_by_tgl('".$tgl_setoran."')");
        mysqli_next_result($con);
    }

?>
<h5 class="mb-1 mt-1">Kode Invoice Terkait</h5>
<p>
    <?php      
    $total = 0;   
        while($data = mysqli_fetch_assoc($result)){
    ?>
    <i class="fas fa-check text-success fa-fw"></i> <?= substr($data['id_invoice'],0,7) ?> : Rp <?= number_format( $data['jumlah_setoran'], 0 , '' , '.' ) . ',-' ?> ||
    <?php $total += $data['jumlah_setoran']; ?>
    <?php $bukti = $data['bukti_transfer']; ?>
    <?php } ?>
</p>
<h5 style="margin-bottom: -20px">Total Setoran</h5>
<p>
    <h3 class="text-danger font-weight-bold mb-1">Rp <?= number_format( $total, 0 , '' , '.' ) . ',-' ?></h3>
</p>
<h5 style="margin-bottom: 5px">Bukti Transfer</h5>
<p>
    <img src="uploadtransfer/<?= $bukti ?>" alt="..." class="img-thumbnail img-fluid">
</p>