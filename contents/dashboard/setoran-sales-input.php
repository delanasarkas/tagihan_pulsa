<div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label required" for="kodeinvoice">Kode Invoice</label>
        <select class="form-control" id="single4" onchange="generate4();">
            <option value="Pilih Kode Invoice">Pilih Kode Invoice</option>
            <option>1111111</option>
            <option>2222222</option>
            <option>3333333</option>
            <option>4444444</option>
            <option>5555555</option>
        </select>
        <div class="invalid-feedback d-block" id="feedbacksetoransales">
        Harap pilih kode invoice
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="kodepenembakan">Kode Penembakan</label>
        <input type="text" class="form-control" placeholder="Kode Penembakan" id="kodepenembakan" readonly>
    </div>
    <div class="form-group col-md-6">
        <label for="namasales">Nama Sales</label>
        <input type="text" class="form-control" placeholder="Nama Sales" id="namasales" readonly>
    </div>
</div>
<div class="form-group">
    <label for="namapelanggan">Nama Pelanggan</label>
    <input type="text" class="form-control" placeholder="Nama Pelanggan" id="namapelanggan" readonly>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggaltagihan">Tanggal Tagihan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Tagihan" id="tanggaltagihan" readonly />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalsetoran">Tanggal Setoran</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Setoran" id="tanggalsetoran" readonly />
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label" for="limitsaldo">Saldo Pelanggan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-coins"></i></div>
            </div>
            <input type="text" class="form-control rupiah" id="limitsaldo"
            placeholder="Saldo Pelanggan" readonly>
        </div>
        <small id="terbilang" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-md-6">
    <label class="control-label required" for="jumlahsetoran">Jumlah Setoran</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="jumlahsetoran"
        placeholder="Jumlah Setoran" onkeyup="inputTerbilang();">
    </div>
    <small id="terbilang2" class="form-text text-muted"></small>
    </div>
</div>
