<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['detailSales'])){
        //id
        $id_sales = $_POST['detailSales'];
        //berdasarkan id sales
        $result = mysqli_query($con, "CALL select_sales_by_id('".$id_sales."')");
        mysqli_next_result($con);

        while($data = mysqli_fetch_assoc($result)){
            $id_sales = $data['id_users'];
            $nama_depan = $data['nama_depan'];
            $nama_belakang = $data['nama_belakang'];
            $email = $data['email_address'];
            $alamat = $data['alamat'];
            $no_tlp = $data['no_tlp'];
            $limits = $data['limits'];
            $status_aktif = $data['stat'];
        }
    }

?>
<div class="row">
    <div class="col-lg-12 text-center">
        <input type="text" class="form-control" value="<?= $id_sales; ?>" name="id_sales" hidden>
        <div class="form-group">
            <div class="text-center">
                <img src="../../assets/dashboard/img/default-avatar.png" class="rounded-circle img-fluid img-thumbnail" width="20%">
            </div>
            <p class="text-capitalize font-weight-bold h4 mt-1"><?= $nama_depan." ".$nama_belakang ?></p>
            <p><?= $email ?></p>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Alamat</strong></label>
                <p>
                    <?php if($alamat=="") { ?>
                        - 
                    <?php } else { 
                        echo $alamat; ?>
                        <a href="http://maps.google.com/maps?q=<?= $alamat; ?>" target="_blank"><i class="fa fa-map-marker-alt text-danger"></i></a>
                    <?php } ?>
                </p>
            </div>
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Nomor Telepon</strong></label>
                <p>
                    <?php if($no_tlp=="") { ?>
                        - 
                    <?php } else { 
                        echo $no_tlp; ?>
                        <a href="https://api.whatsapp.com/send?phone=<?= $no_tlp; ?>&text=Silahkan Chat Kepada Sales <?= $nama_depan." ".$nama_belakang; ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Limit Saldo</strong></label>
                <p>Rp.<?= $limits ?></p>
            </div>
            <div class="col-lg-6">
                <label for="exampleFormControlInput1"><strong>Status</strong></label>
                <p><span class="badge badge-pill <?= $status_aktif == 'aktif' ? 'badge-success' : 'badge-danger'; ?>"><?= $status_aktif ?></span></p>
            </div>
        </div>
    </div>
</div>