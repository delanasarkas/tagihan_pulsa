<?php

    //session
    session_start();
    
    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['updateSaldoLimit'])){
    $id_saldo = $_POST['updateSaldoLimit'];
    $result2 = mysqli_query($con,"CALL select_saldo_limit_by_id('".$id_saldo."')");
        while($row=mysqli_fetch_array($result2)){
            $id=$row['id_saldo'];
            $id_users=$row['id_users'];
            $nama_depan=$row['nama_depan'];
            $nama_belakang=$row['nama_belakang'];
            $saldo=$row['saldo'];
        }
        mysqli_next_result($con);
    }
?>
<input type="hidden" name="idLimit" value="<?= $id; ?>">
<div class="form-group">
    <label class="control-label required" for="namasales">Nama Sales</label>
    <select class="form-control namasales" id="single3" onchange="generates();" name="namasales">
        <option value="Pilih Nama Sales">Pilih Nama Sales</option>
        <?php 
          $result2 = mysqli_query($con,"SELECT * FROM users WHERE rolle = 'sales'");
          while($data = mysqli_fetch_assoc($result2)) { 
        ?>
        <option value="<?=  $id_users ?>" <?= $data['id_users'] == $id_users ? 'selected' : ''; ?>><?= $data['nama_depan'] ?> <?= $data['nama_belakang'] ?></option>
        <?php } ?>
    </select>
    <div class="invalid-feedback d-block" id="feedbacksaldolimit2">
        Harap pilih nama sales
    </div>
    <span class="error-text" id="errorNamaSales2"></span>
</div>
<div class="form-group">
  <label class="control-label required" for="nominalsaldopengirimanubah">Nominal Saldo Pengiriman</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
      </div>
      <input type="text" class="form-control rupiah" id="nominalsaldopengirimanubah"
        placeholder="Transaksi Penembakan" value="<?= number_format( $saldo, 0 , '' , '.' ) ?>" name="nominalsaldopengirimanubah" onkeyup="inputTerbilang2();">
  </div>
  <small id="terbilang3" class="form-text text-muted"></small>
  <span class="error-text" id="errorNominalSaldo2"></span>
</div>
<script>
$(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("nominalsaldopengirimanubah").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang3").innerHTML = terbilang(input).replace(/  +/g, ' ');
    })
</script>
<script>
    $("#single3").select2({
    theme: "bootstrap",
    // disabled:readonly
  });
</script>
<script>
  function generates() {
    if (document.getElementById("single3").value == "Pilih Nama Sales") {
      document.getElementById("feedbacksaldolimit2").classList.remove("valid-feedback");
      document.getElementById("feedbacksaldolimit2").classList.add("invalid-feedback");
      document.getElementById("feedbacksaldolimit2").innerHTML = "Harap pilih nama sales";
    } else {
      document.getElementById("feedbacksaldolimit2").classList.remove("invalid-feedback");
      document.getElementById("feedbacksaldolimit2").classList.add("valid-feedback");
      document.getElementById("feedbacksaldolimit2").innerHTML = "Nama sales sudah dipilih";
    }
  }
</script>
<script>
  $(document).ready(function(){
    if (document.getElementsByClassName("namasales").value == "Pilih Nama Sales") {
      document.getElementById("feedbacksaldolimit2").classList.remove("valid-feedback");
      document.getElementById("feedbacksaldolimit2").classList.add("invalid-feedback");
      document.getElementById("feedbacksaldolimit2").innerHTML = "Harap pilih nama sales";
    } else {
      document.getElementById("feedbacksaldolimit2").classList.remove("invalid-feedback");
      document.getElementById("feedbacksaldolimit2").classList.add("valid-feedback");
      document.getElementById("feedbacksaldolimit2").innerHTML = "Nama sales sudah dipilih";
    }
  });
</script>