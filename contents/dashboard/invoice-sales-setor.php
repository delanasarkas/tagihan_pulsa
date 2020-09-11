<?php

    //session
    session_start();
    
    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['setorInvoice'])){
    $kodeInvoice = $_POST['setorInvoice'];
    $result2 = mysqli_query($con,"CALL select_invoice_tagihan_by_id('".$kodeInvoice."')");
        while($data=mysqli_fetch_array($result2)){
            $id_invoice = $data['id_invoice'];
            $id_pelanggan = $data['id_pelanggan'];
            $id_transaksi = $data['id_transaksi'];
            $kode_penembakan = $data['kode_penembakan'];
            $nama_depan = $data['nama_depan'];
            $nama_belakang = $data['nama_belakang'];
            $nama_pelanggan = $data['nama_pelanggan'];
            $tgl_penagihan = $data['tgl_penagihan'];
            $total = $data['total'];
            $status_invoice = $data['status_invoice'];
        }
        mysqli_next_result($con);
    }
?>
<input type="hidden" class="form-control" value="<?= $id_pelanggan ?>" name="idpelanggan" id="idpelanggan" readonly>
<input type="hidden" class="form-control" value="<?= $id_transaksi ?>" name="idtransaksi" id="idtransaksi" readonly>
<div class="form-row">
    <div class="form-group col-md-12">
    <label class="control-label" for="kodeinvoice">Kode Invoice</label>
        <select class="form-control" id="single4" name="kode_invoice">
            <option value="<?= $id_invoice ?>"><?= substr($id_invoice,0,7) ?></option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="kodepenembakan">Kode Penembakan</label>
        <input type="text" class="form-control" placeholder="Kode Penembakan" value="<?= $kode_penembakan ?>" name="kodepenembakan" id="kodepenembakan" readonly>
    </div>
    <div class="form-group col-md-6">
        <label for="namasales">Nama Sales</label>
        <input type="text" class="form-control" placeholder="Nama Sales" value="<?= $nama_depan ?> <?= $nama_belakang ?>" name="namasales" id="namasales" readonly>
    </div>
</div>
<div class="form-group">
    <label for="namapelanggan">Nama Pelanggan</label>
    <input type="text" class="form-control" placeholder="Nama Pelanggan" value="<?= $nama_pelanggan ?>" name="namapelanggan" id="namapelanggan" readonly>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggaltagihan">Tanggal Tagihan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Tagihan" value="<?= $tgl_penagihan ?>" name="tanggaltagihan" id="tanggaltagihan" readonly />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalsetoran">Tanggal Setoran</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Setoran" name="tanggalsetoran" id="tanggalsetoran" readonly />
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
            <input type="text" class="form-control rupiah" value="<?= $total ?>" name="limitsaldo" id="limitsaldo"
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
        <input type="text" class="form-control rupiah" name="jumlahsetoran" id="jumlahsetoran"
        placeholder="Jumlah Setoran" onkeyup="inputTerbilang();">
    </div>
    <small id="terbilang2" class="form-text text-muted"></small>
    <span class="error-text" id="errorSetoran"></span>
    </div>
</div>
<div class="form-group">
    <input type="hidden" class="form-control" placeholder="Nama Pelanggan" name="hasil" id="hasil">
</div>
    <script>
    //get tanggal penagihan
    $(document).ready(function () {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = yyyy + '-' + mm + '-' + dd;

      document.getElementById("tanggalsetoran").value = today;
    });

    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("limitsaldo").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang").innerHTML = terbilang(input).replace(/  +/g, ' ');
    })
  </script>
  <script>
    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    }
    $('#jumlahsetoran').keyup(function(){
        var limitSaldo = $('#limitsaldo').val().replace('.','').replace('.','');
        var setoran = $('#jumlahsetoran').val().replace('.','').replace('.','');

        var total = Number(limitSaldo) - Number(setoran);

        $('#hasil').val(formatNumber(total));
        // Format mata uang.
        $('.rupiah').mask('0.000.000.000', {
            reverse: true
        });
        var input = document.getElementById("jumlahsetoran").value.replace(/\./g, "");
        //menampilkan hasil dari terbilang
        document.getElementById("terbilang2").innerHTML = terbilang(input).replace(/  +/g, ' ');
    });
    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("totalsetoran").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang3").innerHTML = terbilang(input).replace(/  +/g, ' ');
    });
</script>
