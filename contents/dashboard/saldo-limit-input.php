<div class="form-group">
    <label class="control-label required" for="namasales">Nama Sales</label>
    <select class="form-control" id="single" onchange="generate3();">
        <option value="Pilih Nama Sales">Pilih Nama Sales</option>
        <option>Agung Waras</option>
        <option>Ndin Talimah</option>
        <option>Kentung Saidi</option>
        <option>Naenapi Sayan</option>
        <option>Sumon Zera</option>
    </select>
    <div class="invalid-feedback d-block" id="feedbacksaldolimit">
        Harap pilih nama sales
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggaltambahsaldo">Tanggal Tambah Saldo</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Tambah Saldo" id="tanggaltambahsaldo" readonly />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="limitsaldo">Limit Saldo</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-coins"></i></div>
            </div>
            <input type="text" class="form-control rupiah" id="limitsaldo"
            placeholder="Limit Saldo" readonly>
        </div>
        <small id="terbilang" class="form-text text-muted"></small>
    </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label class="control-label required" for="nominalsaldopengiriman">Nominal Saldo Pengiriman</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah" id="nominalsaldopengiriman"
        placeholder="Transaksi Penembakan" onkeyup="inputTerbilang();">
    </div>
    <small id="terbilang2" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-6">
    <label class="control-label" for="totallimit">Total Limit</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah" id="totallimit"
        placeholder="Total Limit" readonly>
    </div>
    <small id="terbilang3" class="form-text text-muted"></small>
  </div>
</div>