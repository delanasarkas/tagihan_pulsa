<?php

    //session
    session_start();
    
    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['updateSales'])){
    $id_sales = $_POST['updateSales'];
    $result2 = mysqli_query($con,"CALL select_sales_by_id('".$id_sales."')");
        while($row=mysqli_fetch_array($result2)){
            $id=$row['id_users'];
            $nama_depan=$row['nama_depan'];
            $nama_belakang=$row['nama_belakang'];
            $email=$row['email_address'];
            $alamat=$row['alamat'];
            $nomor_telepon=$row['no_tlp'];
            $status_aktif=$row['stat'];
        }
        mysqli_next_result($con);
    }
?>
<input type="text" class="form-control form-control-user" id="id_users" name="id_users" value="<?= $id ?>" hidden>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user bg-white" id="nama_depan" placeholder="Nama Depan" value="<?= $nama_depan ?>" readonly>
    </div>
    <div class="col-sm-6">
        <input type="text" class="form-control form-control-user" id="nama_belakang" placeholder="Nama Belakang" value="<?= $nama_belakang ?>" readonly>
    </div>
</div>
<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-at"></i></div>
        </div>
        <input type="email" class="form-control form-control-user" id="email_address" placeholder="Email Address" value="<?= $email ?>" readonly>
    </div>
</div>
<div class="form-group">
<textarea class="form-control textarea" id="alamat" readonly><?= $alamat ?></textarea>
</div>
<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-phone"></i></div>
        </div>
        <input type="text" class="form-control form-control-user" id="no_tlp" placeholder="Nomor Telepon" value="<?= $nomor_telepon ?>" readonly>
    </div>
</div>
<div class="form-group <?php echo $status_aktif == 'tidak aktif' ? 'has-danger' : 'has-success'; ?> status">
    <select class="form-control <?php echo $status_aktif == 'tidak aktif' ? 'form-control-danger' : 'form-control-success'; ?> statusaktif2" name="status_aktif">
      <option value="Tidak Aktif" <?php echo ucwords($status_aktif) == 'Tidak Aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
      <option value="Aktif" <?php echo ucwords($status_aktif) == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
    </select>
</div>
<!-- select status 2-->
<script>
    $(document).ready(function () {
        $('.statusaktif2').change(function () {
            var selectedValue2 = $(this).val();

            if (selectedValue2 === 'Tidak Aktif') {
                $('.status').addClass('has-danger');
                $('.status').removeClass('has-success');
                $(this).addClass('form-control-danger');
                $(this).removeClass('form-control-success');
            } else if (selectedValue2 === 'Aktif') {
                $('.status').addClass('has-success');
                $('.status').removeClass('has-danger');
                $(this).addClass('form-control-success');
                $(this).removeClass('form-control-danger');
            }
        });
    });
</script>