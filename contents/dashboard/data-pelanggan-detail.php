<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['detailPelanggan'])){
        //id
        $id_pelanggan = $_POST['detailPelanggan'];
        //berdasarkan id pelanggan
        $result = mysqli_query($con, "CALL select_pelanggan_by_id('".$id_pelanggan."')");
        mysqli_next_result($con);

        while($data = mysqli_fetch_assoc($result)){
            $id_pelanggan = $data['id_pelanggan'];
            $nama_pelanggan = $data['nama_pelanggan'];
            $alamat_pelanggan = $data['alamat_pelanggan'];
            $nomor_telepon = $data['nomor_telepon'];
            $limit = $data['limits'];
            $sales_terkait = $data['created_by'];
            $status_aktif = $data['status_aktif'];
        }
    }

?>
<div class="row">
    <div class="col-lg-12 text-center">
        <input type="text" class="form-control" value="<?= $id_pelanggan; ?>" name="id_pelanggan" hidden>
        <div class="form-group">
            <div class="text-center">
                <img src="../../assets/dashboard/img/default-avatar.png" class="rounded-circle img-fluid img-thumbnail" width="20%">
            </div>
            <p class="text-capitalize font-weight-bold h4 mt-1"><?= $nama_pelanggan; ?></p>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 offset-lg-3">
            <label for="exampleFormControlInput1"><strong>Alamat Pelanggan</strong></label>
            <p class="text-capitalize"><?= $alamat_pelanggan; ?>
            <a href="http://maps.google.com/maps?q=<?= $alamat_pelanggan; ?>" target="_blank"><i class="fa fa-map-marker-alt text-danger"></i></a>
            </p>
            </div>
        </div>
        <div id="map"></div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Nomor Telepon</strong></label>
                <p><?= $nomor_telepon; ?> <a href="https://api.whatsapp.com/send?phone=<?= $nomor_telepon; ?>&text=Silahkan Chat Kepada Pelanggan <?= $nama_pelanggan; ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></p>
            </div>
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Limit Saldo</strong></label>
                <p>Rp <?= number_format( $limit, 0 , '' , '.' ) . ',-'?></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Sales Terkait</strong></label>
                <p><?= $sales_terkait; ?></p>
            </div>
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Status Aktif</strong></label>
                <p>
                <span class="badge badge-pill <?= $status_aktif == 'aktif' ? 'badge-success' : 'badge-danger'; ?>"><?= $status_aktif; ?></span>
                </p>
            </div>
        </div>
    </div>
</div>