<?php

    //include koneksi
    include('../query/koneksi.php');
    if(isset($_POST['batalTransaksi'])){
        $kode_penembakan = $_POST['batalTransaksi'];
        $result = mysqli_query($con,"CALL select_transaksi_penembakan_by_id('".$kode_penembakan."')");
            while($row=mysqli_fetch_array($result)){
                $kd=$row['kode_penembakan'];
                $kdSales=$row['id_users'];
                $idPelanggan=$row['id_pelanggan'];
                $transPenembakan=$row['transaksi_penembakan'];
                $total=$row['total'];
                $tglPenembakan=$row['tgl_penembakan'];
                $tglPenambahan=$row['tgl_penambahan'];
                $tglPenagihan=$row['tgl_penagihan'];
                $saldoSales=$row['limits'];
                $penambahan=$row['transaksi_penambahan'];
            }
        mysqli_next_result($con);
     }
     
?>
<input type="text" class="form-control" value="<?= $kd; ?>" name="kd_penembakan" hidden>
<input type="text" class="form-control" value="<?= $kdSales; ?>" name="kd_sales" hidden>
<input type="text" class="form-control" value="<?= $idPelanggan; ?>" name="id_pelanggan" hidden>
<input type="text" class="form-control" value="<?= $tglPenembakan; ?>" name="tgl_penembakan" hidden>
<input type="text" class="form-control" value="<?= $tglPenambahan; ?>" name="tgl_penambahan" hidden>
<input type="text" class="form-control" value="<?= $tglPenagihan; ?>" name="tgl_penagihan" hidden>
<input type="text" class="form-control" value="<?= $transPenembakan; ?>" name="trans_penenmbakan" hidden>
<input type="text" class="form-control" value="<?= $penambahan; ?>" name="trans_penambahan" hidden>
<input type="text" class="form-control" value="<?= $total; ?>" name="total" hidden>
Kembalikan Transaksi <strong><?= $kd; ?></strong> ?