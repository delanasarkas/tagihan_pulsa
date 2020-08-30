<?php

    //berdasarkan id pelanggan
    $result2 = mysqli_query($con, "CALL select_pelanggan_by_id('".$data['id_pelanggan']."')");
    mysqli_next_result($con);

?>
<?php 
	while($data2 = mysqli_fetch_assoc($result2)){
    $id_pelanggan = $data2['id_pelanggan'];
    $nama_pelanggan = $data2['nama_pelanggan'];
    $alamat_pelanggan = $data2['alamat_pelanggan'];
    $nomor_telepon = $data2['nomor_telepon'];
    $status_aktif = $data2['status_aktif'];
?>
<input type="text" class="form-control" value="<?= $id_pelanggan; ?>" name="id_pelanggan" hidden>
<div class="form-group">
    <label for="namapelanggan">Nama Pelanggan</label>
    <input type="text" class="form-control namapelanggan2" placeholder="Nama Pelanggan" value="<?= $nama_pelanggan; ?>" name="nama_pelanggan">
    <span class="error-text" id="errorNamaPelanggan2"></span>
</div>
<div class="form-group">
    <label for="alamatpelanggan">Alamat Pelanggan</label>
    <textarea class="form-control" placeholder="Alamat Pelanggan" id="alamatpelanggan2" rows="3" name="alamat_pelanggan"><?= $alamat_pelanggan; ?></textarea>
    <span class="error-text" id="errorAlamatPelanggan2"></span>
</div>
<div class="form-group">
    <label for="nomortelepon">Nomor Telepon</label>
    <input type="number" class="form-control" placeholder="Nomor Telepon" id="nomortelepon2" value="<?= $nomor_telepon; ?>" name="nomor_telepon">
    <span class="error-text" id="errorNomorTelepon2"></span>
</div>
<div class="form-group <?php echo $status_aktif == 'tidak aktif' ? 'has-danger' : 'has-success'; ?> status">
    <label for="statusaktif2">Status Aktif</label>
    <select class="form-control <?php echo $status_aktif == 'tidak aktif' ? 'form-control-danger' : 'form-control-success'; ?> statusaktif2" name="status_aktif">
        <option value="Tidak Aktif" <?php echo ucwords($status_aktif) == 'Tidak Aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
        <option value="Aktif" <?php echo ucwords($status_aktif) == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
    </select>
</div>

<?php } ?>