<div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label required" for="kodepenembakan">Kode Penembakan</label>
        <select class="form-control" id="single3" onchange="generate2();">
            <option value="Pilih Kode Penembakan">Pilih Kode Penembakan</option>
            <option>Agung Waras</option>
            <option>Ndin Talimah</option>
            <option>Kentung Saidi</option>
            <option>Naenapi Sayan</option>
            <option>Sumon Zera</option>
        </select>
        <div class="invalid-feedback d-block" id="feedbackpenamabahanpenembakan">
        Harap pilih kode penembakan
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label" for="namasales">Nama Sales</label>
    <input type="text" class="form-control" id="namasales" placeholder="Nama Sales" readonly>
    </div>
    <div class="form-group col-md-6">
    <label class="control-label" for="namapelanggan">Nama Pelanggan</label>
    <input type="text" class="form-control" id="namapelanggan" placeholder="Nama Pelanggan" readonly>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalpenembakan">Tanggal Penembakan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Penembakan" id="tanggalpenembakan" readonly />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalpenagihan">Tanggal Penagihan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Penagihan" id="tanggalpenagihan" readonly />
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label" for="saldosales2">Saldo Anda</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="saldosales2"
        placeholder="Saldo Anda" readonly>
    </div>
    <small id="terbilang3" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-md-6">
    <label class="control-label required" for="jumlahpenambahantransaksipenembakan">Jumlah Penambahan</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="jumlahpenambahantransaksipenembakan"
        placeholder="Jumlah Penambahan" onkeyup="inputTerbilang2();">
    </div>
    <small id="terbilang4" class="form-text text-muted"></small>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label" for="sisatransaksipenembakan">Sisa Transaksi Penembakan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-coins"></i></div>
            </div>
            <input type="text" class="form-control rupiah" id="sisatransaksipenembakan"
            placeholder="Sisa Transaksi" readonly>
        </div>
        <small id="terbilang5" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-md-6">
    <label class="control-label" for="totaltransaksipenembakan">Total Penambahan</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="totaltransaksipenembakan"
        placeholder="Total Penambahan" readonly>
    </div>
    <small id="terbilang6" class="form-text text-muted"></small>
    </div>
</div>