<div class="form-group">
    <label class="control-label" for="namasales">Nama Sales</label>
    <select class="form-control" id="single" onchange="generate3();">
        <option>Agung Waras</option>
        <option>Ndin Talimah</option>
        <option>Kentung Saidi</option>
        <option>Naenapi Sayan</option>
        <option>Sumon Zera</option>
    </select>
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
            <input type="text" class="form-control rupiah" id="limitsaldoubah"
            placeholder="Limit Saldo" readonly>
        </div>
        <small id="terbilang4" class="form-text text-muted"></small>
    </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label class="control-label" for="nominalsaldopengiriman">Nominal Saldo Pengiriman</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah" id="nominalsaldopengirimanubah"
        placeholder="Transaksi Penembakan" onkeyup="inputTerbilang2();">
    </div>
    <small id="terbilang5" class="form-text text-muted"></small>
  </div>
  <div class="form-group col-md-6">
    <label class="control-label" for="totallimit">Total Limit</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah" id="totallimitubah"
        placeholder="Total Limit" readonly>
    </div>
    <small id="terbilang6" class="form-text text-muted"></small>
  </div>
</div>