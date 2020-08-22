<div class="form-group" style="margin-top: -21px">
    <label class="control-label" for="namapelanggan">Setoran Pending</label>
    <select class="form-control" id="single5"  multiple="multiple" readonly>
      <option>Agung Waras</option>
      <option>Ndin Talimah</option>
      <option>Kentung Saidi</option>
      <option>Naenapi Sayan</option>
      <option>Sumon Zera</option>
    </select>
</div>
<div class="form-group">
    <label for="totalsetoran">Total Setoran</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah" id="totalsetoran"
        placeholder="Total Setoran" readonly>
    </div>
    <small id="terbilang3" class="form-text text-muted"></small>
  </div>
<div class="form-group">
  <div class="custom-file">
    <input type="file" id="uploadtransfer" class="custom-file-input">
    <label class="custom-file-label" for="uploadtransfer">Pilih File...</label>
  </div>
  <button type="button" class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
  <button type="button" class="btn btn-danger" id="resetUpload"><i class="fas fa-undo"></i> Reset</button>
</div>