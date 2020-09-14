<?php

$querySum = mysqli_query($con,"CALL select_setoran_sales_sum('".$id."')");
while($seluruh = mysqli_fetch_assoc($querySum)){
  $total = $seluruh['setoran'];
}

?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group" style="margin-top: -30px">
    <label for="totalsetoran">Total Setoran</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins text-danger"></i></div>
      </div>
      <input type="text" class="form-control rupiah text-danger font-weight-bold" id="totalsetoran"
        placeholder="Total Setoran" name="totalsetoran" value="<?= $total ?>" readonly required>
    </div>
    <small id="terbilang3" class="form-text text-muted"></small>
    <span class="error-text"><?= $setoran ?></span>
  </div>
<div class="form-group">
  <div class="custom-file">
    <input type="file" id="uploadtransfer" name="uploadtransfer" class="custom-file-input" required>
    <label class="custom-file-label" for="uploadtransfer">Pilih File...</label>
  </div>
  <button type="submit" class="btn btn-success" name="upload"><i class="fas fa-upload"></i> Upload</button>
  <button type="button" class="btn btn-danger" id="resetUpload"><i class="fas fa-undo"></i> Reset</button>
</div>
<span><?= $validasi; ?></span>
</form>