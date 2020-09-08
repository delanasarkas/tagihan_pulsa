<?php

    //session
    session_start();
    
    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['penambahanTransaksi'])){
    $kodePenembakan = $_POST['penambahanTransaksi'];
    $result2 = mysqli_query($con,"CALL select_transaksi_penembakan_by_id('".$kodePenembakan."')");
        while($row=mysqli_fetch_array($result2)){
            $kdPenembakan=$row['kode_penembakan'];
            $namaSales=$row['nama_depan'].' '.$row['nama_belakang'];
            $namaPelanggan=$row['nama_pelanggan'];
            $idPelanggan=$row['id_pelanggan'];
            $transPenembakan=$row['transaksi_penembakan'];
            $total=$row['total'];
            $tglPenembakan=$row['tgl_penembakan'];
            $tglPenagihan=$row['tgl_penagihan'];
            $saldoSales=$row['limits'];
            $penambahan=$row['transaksi_penambahan'];
        }
        mysqli_next_result($con);
    }
?>
<input type="hidden" class="form-control" id="transpenambahan" name="transpenambahan" value="<?= $penambahan ?>" placeholder="Kode Penembakan" readonly>
<div class="form-group">
    <label class="control-label" for="kodepenembakan">Kode Penembakan</label>
    <input type="text" class="form-control" id="kodepenembakan" name="kodepenembakan" value="<?= $kdPenembakan ?>" placeholder="Kode Penembakan" readonly>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label class="control-label" for="namasales">Nama Sales</label>
    <input type="text" class="form-control" id="namasales" name="namasales" value="<?= $namaSales ?>" placeholder="Nama Sales" readonly>
    </div>
    <div class="form-group col-md-6">
    <label class="control-label" for="namapelanggan">Nama Pelanggan</label>
    <select class="form-control namapelangganinput" id="single" name="namapelanggan">
      <option value="<?= $idPelanggan ?>"><?= $namaPelanggan ?></option>
    </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalpenembakan">Tanggal Penembakan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Penembakan" value="<?= $tglPenembakan ?>" id="tanggalpenembakan" name="tanggalpenembakan" readonly />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="control-label text-dark" for="tanggalpenagihan">Tanggal Penagihan</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
            </div>
            <input type="text" class="form-control" placeholder="Tanggal Penagihan" value="<?= $tglPenagihan ?>" id="tanggalpenagihan" name="tanggalpenagihan" readonly />
        </div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
    <label class="control-label" for="saldosales2">Saldo Anda</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="saldosales2"
        placeholder="Saldo Anda" name="saldosales" value="<?= $saldoSales; ?>" readonly>
    </div>
    <small id="terbilang3" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-md-4">
        <label class="control-label" for="sisatransaksipenembakan">Sisa Transaksi</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-coins"></i></div>
            </div>
            <input type="text" class="form-control rupiah" name="sisatransaksipenembakan" id="sisatransaksipenembakan"
            placeholder="Sisa Transaksi" value="<?= $total; ?>" readonly>
        </div>
        <small id="terbilang5" class="form-text text-muted"></small>
    </div>
    <div class="form-group col-md-4">
    <label class="control-label" for="totaltransaksipenembakan">Total Penambahan</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="totaltransaksipenembakan"
        placeholder="Total Penambahan" name="totaltransaksipenembakan" readonly>
    </div>
    <small id="terbilang6" class="form-text text-muted"></small>
    <span class="error-text" id="errorTotalPenambahan"></span>
    </div>
</div>
<div class="form-group">
    <label class="control-label required" for="jumlahpenambahantransaksipenembakan">Jumlah Penambahan</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-coins"></i></div>
        </div>
        <input type="text" class="form-control rupiah" id="jumlahpenambahantransaksipenembakan"
        placeholder="Jumlah Penambahan" name="jumlahpenambahantransaksipenembakan" onkeyup="inputTerbilang2();">
    </div>
    <small id="terbilang4" class="form-text text-muted"></small>
    <span class="error-text" id="errorTransaksiPenambahan"></span>
</div>

<script>
    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("saldosales2").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang3").innerHTML = terbilang(input).replace(/  +/g, ' ');
    });
    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("sisatransaksipenembakan").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang5").innerHTML = terbilang(input).replace(/  +/g, ' ');
    });
</script>
<script>
    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    }
    $('#jumlahpenambahantransaksipenembakan').keyup(function(){
        var sisaTransaksi = $('#sisatransaksipenembakan').val().replace('.','').replace('.','');
        var transaksiPenambahan = $('#jumlahpenambahantransaksipenembakan').val().replace('.','').replace('.','');

        var total = Number(sisaTransaksi) + Number(transaksiPenambahan);

        $('#totaltransaksipenembakan').val(formatNumber(total));
        // Format mata uang.
        $('.rupiah').mask('0.000.000.000', {
            reverse: true
        });
        var input = document.getElementById("totaltransaksipenembakan").value.replace(/\./g, "");
        //menampilkan hasil dari terbilang
        document.getElementById("terbilang6").innerHTML = terbilang(input).replace(/  +/g, ' ');
        });
</script>