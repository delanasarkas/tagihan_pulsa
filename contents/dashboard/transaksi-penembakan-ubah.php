<div class="form-group">
    <label class="control-label text-dark" for="kodepenembakan">Kode Penembakan</label>
    <div class="form-inline">
        <input type="text"
            class="form-control is-invalid input-kode-penembakan <?php if($page=="transaksipenembakan"){echo 'active';}?>"
            id="kodepenembakan" placeholder="Kode Penembakan" value="" readonly>
        <button type="button" onclick="generate();" class="btn btn-primary mb-2 ml-2 disabled">Generate</button>
        <div class="invalid-feedback d-block" id="feedbackpenembakan">
            Harap generate kode penembakan
        </div>
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
<div class="form-group">
    <label class="control-label text-dark" for="jumlahtransaksipenembakan">Jumlah Transaksi Penembakan</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="jumlahtransaksipenembakan"
            placeholder="Jumlah Transaksi Penembakan" onkeyup="inputTerbilang();">
    </div>
    <small id="terbilang" class="form-text text-muted"></small>
</div>