<?php

    //session
    session_start();
    
    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['updatePelanggan'])){
    $id_pelanggan = $_POST['updatePelanggan'];
    $result2 = mysqli_query($con,"CALL select_pelanggan_by_id('".$id_pelanggan."')");
        while($row=mysqli_fetch_array($result2)){
            $id=$row['id_pelanggan'];
            $nama_pelanggan=$row['nama_pelanggan'];
            $alamat_pelanggan=$row['alamat_pelanggan'];
            $nomor_telepon=$row['nomor_telepon'];
            $status_aktif=$row['status_aktif'];
        }
    }
?>
<input type="text" class="form-control idpelanggan2" value="<?= $id; ?>" name="id_pelanggan">
<div class="form-group">
    <label for="namapelanggan">Nama Pelanggan</label>
    <input type="text" class="form-control namapelanggan2" placeholder="Nama Pelanggan" value="<?= $nama_pelanggan; ?>" name="nama_pelanggan">
    <span class="error-text errorNamaPelanggan2"></span>
</div>
<div class="form-group">
    <label for="alamatpelanggan">Alamat Pelanggan</label>
    <textarea class="form-control alamatpelanggan2" placeholder="Alamat Pelanggan" rows="3" name="alamat_pelanggan"><?= $alamat_pelanggan; ?></textarea>
    <span class="error-text errorAlamatPelanggan2"></span>
</div>
<div class="form-group">
    <label for="nomortelepon">Nomor Telepon</label>
    <input type="number" class="form-control nomortelepon2" placeholder="Nomor Telepon" value="<?= $nomor_telepon; ?>" name="nomor_telepon">
    <span class="error-text errorNomorTelepon2"></span>
</div>
<div class="form-group <?php echo $status_aktif == 'tidak aktif' ? 'has-danger' : 'has-success'; ?> status">
    <label for="statusaktif2">Status Aktif</label>
    <select class="form-control <?php echo $status_aktif == 'tidak aktif' ? 'form-control-danger' : 'form-control-success'; ?> statusaktif2" name="status_aktif">
        <option value="Tidak Aktif" <?php echo ucwords($status_aktif) == 'Tidak Aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
        <option value="Aktif" <?php echo ucwords($status_aktif) == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
    </select>
</div>