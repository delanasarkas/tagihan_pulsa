<div class="form-group">
    <label class="control-label text-dark" for="kodepenembakan">Kode Penembakan</label>
    <div class="form-inline">
        <input type="text"
            class="form-control input-kode-penembakan"
            id="kodepenembakan" placeholder="Kode Penembakan" value="" readonly>
    </div>
</div>
<div class="form-group">
    <label class="control-label text-dark" for="namasales">Nama Sales</label>
    <input type="text" class="form-control kode-penembakan" id="namasales" placeholder="Nama Sales" readonly>
</div>
<div class="form-group">
    <label class="control-label text-dark" for="namapelanggan">Nama Pelanggan</label>
    <select class="form-control" id="single2">
        <option>Pilih Nama Pelanggan</option>
        <option>Agung Waras</option>
        <option>Ndin Talimah</option>
        <option>Kentung Saidi</option>
        <option>Naenapi Sayan</option>
        <option>Sumon Zera</option>
    </select>
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
        <label class="control-label" for="saldosales">Saldo Anda</label>
        <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="saldosales3"
            placeholder="Saldo Anda" readonly>
        </div>
        <small id="terbilang7" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="jumlahtransaksipenembakan">Transaksi Penembakan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-coins"></i></div>
            </div>
            <input type="text" class="form-control rupiah" id="jumlahtransaksipenembakan2"
                placeholder="Transaksi Penembakan" onkeyup="inputTerbilang3();">
        </div>
        <small id="terbilang8" class="form-text text-muted"></small>
    </div>
</div>