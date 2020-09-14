<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['detailSetoran'])){
        //id
        $id_setoran = $_POST['detailSetoran'];
        //berdasarkan id pelanggan
        $result = mysqli_query($con, "CALL select_setoran_sales_by_id('".$id_setoran."')");
        mysqli_next_result($con);

        while($data = mysqli_fetch_assoc($result)){
            $id_invoice = $data['id_invoice'];
            $kode_penembakan = $data['kode_penembakan'];
            $nama_depan = $data['nama_depan'];
            $nama_belakang = $data['nama_belakang'];
            $nama_pelanggan = $data['nama_pelanggan'];
            $tgl_penagihan = $data['tgl_penagihan'];
            $tgl_setoran = $data['tgl_setoran'];
            $limits = $data['limits'];
            $jumlah_setoran = $data['jumlah_setoran'];
            $keterangan = $data['keterangan'];
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
        <div class="form-row mt-5">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Kode Invoice</strong></label>
                <p><?= substr($id_invoice,0,7) ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Kode Penembakan</strong></label>
                <p><?= $kode_penembakan ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Nama Sales</strong></label>
                <p><?= $nama_depan ?> <?= $nama_belakang ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Nama Pelanggan</strong></label>
                <p><?= $nama_pelanggan ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Tanggal Tagihan</strong></label>
                <p><?= date('d-m-Y',strtotime($tgl_penagihan)) ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Tanggal Setor</strong></label>
                <p><?= date('d-m-Y',strtotime($tgl_setoran)) ?></p>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Saldo Pelanggan</strong></label>
                <p>Rp <?= number_format( $limits, 0 , '' , '.' ) . ',-' ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1"><strong>Jumlah Setoran</strong></label>
                <p>Rp <?= number_format( $jumlah_setoran, 0 , '' , '.' ) . ',-' ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"><strong>Status Setoran</strong></label>
            <p>
                <span class="badge badge-pill <?php if($keterangan == 'pending'){ echo 'badge-warning'; }else if($keterangan == 'belum konfirmasi'){ echo 'badge-info'; }else if($keterangan == 'diterima'){ echo 'badge-success'; }else if($keterangan == 'ditolak'){ echo 'badge-danger'; } ?>"><?= $keterangan ?></span>
            </p>
        </div>
    </div>
</div>