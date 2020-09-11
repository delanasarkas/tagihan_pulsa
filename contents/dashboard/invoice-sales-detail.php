<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['detailInvoice'])){
        //id
        $id_invoice = $_POST['detailInvoice'];
        //berdasarkan id pelanggan
        $result = mysqli_query($con, "CALL select_invoice_tagihan_by_id('".$id_invoice."')");
        mysqli_next_result($con);

        while($data = mysqli_fetch_assoc($result)){
            $id_invoice = $data['id_invoice'];
            $kode_penembakan = $data['kode_penembakan'];
            $nama_depan = $data['nama_depan'];
            $nama_belakang = $data['nama_belakang'];
            $nama_pelanggan = $data['nama_pelanggan'];
            $tgl_penagihan = $data['tgl_penagihan'];
            $total = $data['total'];
            $status_invoice = $data['status_invoice'];

        }
    }

?>
<div class="row">
    <div class="col-lg-12  text-center">
        <div class="form-group">
            <div class="text-center">
                <i class="fas fa-donate fa-5x"></i>
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
                <label for="exampleFormControlInput1"><strong>Nominal Tagihan</strong></label>
                <p>Rp <?= number_format( $total, 0 , '' , '.' ) . ',-' ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"><strong>Status Invoice</strong></label>
            <p><span class="badge badge-pill <?php if($status_invoice == 'belum proses'){ echo 'badge-danger'; }else{ echo 'badge-success'; } ?>"><?= $status_invoice ?></span></p>
        </div>
    </div>
</div>