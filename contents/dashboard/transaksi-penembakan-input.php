<div class="form-group">
  <label class="control-label required" for="kodepenembakan">Kode Penembakan</label>
  <div class="form-inline">
    <input type="text"
      class="form-control is-invalid input-kode-penembakan"
      id="kodepenembakan" placeholder="Kode Penembakan" name="kodepenembakan" style="width:227px !important" readonly>
    <button type="button" onclick="generate();" class="btn btn-primary mb-2 ml-2">Generate</button>
    <div class="invalid-feedback d-block" id="feedbackpenembakan">
      Harap generate kode penembakan
    </div>
    <span class="error-text" id="errorKodePenembakanInput"></span>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label class="control-label" for="namasales">Nama Sales</label>
    <input type="text" class="form-control" id="namasalesinput" name="namasales" value="<?= $_SESSION['namaDepan'] ?> <?= $_SESSION['namaBelakang'] ?>" placeholder="Nama Sales" readonly>
    <span class="error-text" id="errorNamaSalesInput"></span>
  </div>
  <div class="form-group col-md-6">
    <label class="control-label required" for="namapelanggan">Nama Pelanggan</label>
    <select class="form-control namapelangganinput" id="single" name="namapelanggan">
      <option value="Pilih Nama Pelanggan">Pilih Nama Pelanggan</option>
      <?php
        $queryPelanggan = mysqli_query($con,"CALL select_pelanggan_all");
        mysqli_next_result($con);
        while($dataPelanggan=mysqli_fetch_assoc($queryPelanggan)) {
      ?>
        <option value="<?= $dataPelanggan['id_pelanggan'] ?>"><?= $dataPelanggan['nama_pelanggan'] ?></option>
      <?php } ?>
    </select>
    <span class="error-text" id="errorNamaPelangganInput"></span>
  </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalpenembakan">Tanggal Penembakan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="date" class="form-control" placeholder="Tanggal Penembakan" id="tanggalpenembakan" name="tanggalpenembakan" readonly />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalpenagihan">Tanggal Penagihan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="date" class="form-control" placeholder="Tanggal Penagihan" name="tanggalpenagihan" id="tanggalpenagihan" readonly />
        </div>
    </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label class="control-label" for="saldosales">Saldo Anda</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <?php $querySaldo = mysqli_query($con,"CALL select_users('".$_SESSION['userId']."')");
        $rowSaldo = mysqli_fetch_array($querySaldo);
        mysqli_next_result($con);
      ?>
      <input type="text" class="form-control rupiah" id="saldosales"
        placeholder="Saldo Anda" value="<?= $rowSaldo['limits'] ?>" name="saldosales" readonly>
    </div>
    <small id="terbilang2" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-6">
    <label class="control-label required" for="jumlahtransaksipenembakan">Transaksi Penembakan</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah" id="jumlahtransaksipenembakan"
        placeholder="Transaksi Penembakan" name="jumlahtransaksipenembakan" onkeyup="inputTerbilang();">
    </div>
    <small id="terbilang" class="form-text text-muted"></small>
    <span class="error-text" id="errorJumlahTransaksi"></span>
  </div>
</div>