<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['detailTransaksi'])){
        //id
        $id_transaksi = $_POST['detailTransaksi'];
        //berdasarkan id pelanggan
        $result = mysqli_query($con, "CALL select_transaksi_penembakan_by_id('".$id_transaksi."')");
        mysqli_next_result($con);

        while($data = mysqli_fetch_assoc($result)){
            $kode_penembakan = $data['kode_penembakan'];
            $nama_depan = $data['nama_depan'];
            $nama_belakang = $data['nama_belakang'];
            $nama_pelanggan = $data['nama_pelanggan'];
            $tgl_penembakan = $data['tgl_penembakan'];
            $tgl_penambahan = $data['tgl_penambahan'];
            $tgl_penagihan = $data['tgl_penagihan'];
            $transaksi_penembakan = $data['transaksi_penembakan'];
            $transaksi_penambahan = $data['transaksi_penambahan'];
            $total = $data['total'];
        }
    }

?>
<div class="row">
    <div class="col-lg-12 text-center">
        <div class="form-group">
            <div class="text-center">
                <i class="fas fa-comments-dollar fa-5x"></i>
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col-md-6 mb-3">
                <label for=""><strong>Kode Penembakan</strong></label>
                <p><?= $kode_penembakan; ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for=""><strong>Nama Sales</strong></label>
                <p><?= $nama_depan; ?> <?= $nama_belakang; ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for=""><strong>Nama Pelanggan</strong></label>
                <p><?= $nama_pelanggan; ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for=""><strong>Tanggal Penembakan</strong></label>
                <p><?= date('d-m-Y',strtotime($tgl_penembakan)); ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for=""><strong>Tanggal Penambahan</strong></label>
                <p><?= $tgl_penambahan == null ? '-' : date('d-m-Y',strtotime($tgl_penambahan)); ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for=""><strong>Tanggal Penagihan</strong></label>
                <p><?= date('d-m-Y',strtotime($tgl_penagihan)); ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for=""><strong>Jumlah Transaksi Penembakan</strong></label>
                <p>Rp <?= number_format( $transaksi_penembakan, 0 , '' , '.' ) . ',-' ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for=""><strong>Jumlah Transaksi Penambahan</strong></label>
                <p>Rp <?= number_format( $transaksi_penambahan, 0 , '' , '.' ) . ',-' ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for=""><strong>Total Keseluruhan</strong></label>
            <p>Rp <?= number_format( $total, 0 , '' , '.' ) . ',-' ?></p>
        </div>
    </div>
</div>