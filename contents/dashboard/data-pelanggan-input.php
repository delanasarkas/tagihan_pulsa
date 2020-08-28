<div class="form-group">
    <label for="namapelanggan" class="required">Nama Pelanggan</label>
    <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan" id="nama_pelanggan" maxlength="30">
    <span class="error-text" id="errorNamaPelanggan"></span>
</div>
<div class="form-group">
    <label for="alamatpelanggan" class="required">Alamat Pelanggan</label>
    <textarea class="form-control" name="alamat_pelanggan" placeholder="Alamat Pelanggan" id="alamat_pelanggan" rows="3"></textarea>
    <span class="error-text" id="errorAlamatPelanggan"></span>
</div>
<div class="form-group">
    <label for="nomortelepon" class="required">Nomor Telepon</label>
    <input type="number" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon" id="nomor_telepon" maxlength="12">
    <span class="error-text" id="errorNomorTelepon"></span>
</div>
<div class="form-group has-danger status">
    <label for="statusaktif" class="required">Status Aktif</label>
    <select class="form-control form-control-danger" name="status_aktif" id="statusaktif">
      <option value="Tidak Aktif">Tidak Aktif</option>
      <option value="Aktif">Aktif</option>
    </select>
  </div>