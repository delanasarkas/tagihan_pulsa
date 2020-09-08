<div class="form-group">
    <label class="control-label required" for="namasales">Nama Sales</label>
    <select class="form-control namasales" id="single2" onchange="generate3();" name="namasales">
        <option value="Pilih Nama Sales">Pilih Nama Sales</option>
        <?php 
          $result2 = mysqli_query($con,"SELECT * FROM users WHERE rolle = 'sales'");
          while($data = mysqli_fetch_assoc($result2)) { 
        ?>
        <option value="<?= $data['id_users'] ?>"><?= $data['nama_depan'] ?> <?= $data['nama_belakang'] ?></option>
        <?php } ?>
    </select>
    <div class="invalid-feedback d-block" id="feedbacksaldolimit">
        Harap pilih nama sales
    </div>
    <span class="error-text" id="errorNamaSales"></span>
</div>
<div class="form-group">
  <label class="control-label required" for="nominalsaldopengiriman">Nominal Saldo Pengiriman</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah nominalsaldopengiriman" id="nominalsaldopengiriman"
        placeholder="Transaksi Penembakan" name="nominalsaldopengiriman" onkeyup="inputTerbilang();">
  </div>
  <small id="terbilang2" class="form-text text-muted"></small>
  <span class="error-text" id="errorNominalSaldo"></span>
  <span class="error-text" id="errorLimitSales"></span>
</div>