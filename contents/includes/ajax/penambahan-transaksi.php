<script>
  $(document).on('click', '.penambahanTransaksi', function (e) {
    e.preventDefault();

    var penambahanTransaksi = $(this).attr("id");
    //ajax
    $.ajax({
      url: "transaksi-penembakan-penambahan.php",
      type: 'POST',
      data: {
        penambahanTransaksi: penambahanTransaksi
      },
      success: function (data) {
        $('#infoPenambahanTransaksi').html(data);
        $('#modalCreatePenambahan').modal('show');
      }
    });
  });

  $(document).on('click', '#simpanPerubahanButton', function (e) {
    e.preventDefault();
    var data = $('#penambahanForm').serialize();
    //variable
    var transaksiPenambahan = $('#jumlahpenambahantransaksipenembakan').val().replace('.','').replace('.','').replace('-','');
    var validtransaksiPenambahan = true;
    var totalPenambahan = $('#totaltransaksipenembakan').val().replace('.','').replace('.','').replace('-','');
    var validtotalPenambahan = true;

    if(transaksiPenambahan== ""){
        $('#errorTransaksiPenambahan').html('Jumlah transaksi tidak boleh kosong');
        validtransaksiPenambahan= false;
    }else if(transaksiPenambahan < 100000 || transaksiPenambahan > 5000000){
        $('#errorTransaksiPenambahan').html('Jumlah penambahan minimal Rp 100.000 dan maksimal Rp 5.000.000');
        validtransaksiPenambahan= false;
    }

    if(totalPenambahan== ""){
        $('#errorTotalPenambahan').html('Total transaksi tidak boleh kosong');
        validtotalPenambahan= false;
    }

    //jika sukses
    if(validtransaksiPenambahan && validtotalPenambahan){
      $.ajax({
        url: "../query/input-data-transaksi-penambahan.php",
        type: 'POST',
        data: data,
        success: function (data) {
          $('#modalCreatePenambahan').modal('hide');
          Notiflix.Report.Success(
            'Pesan Konfirmasi',
            'Penambahan Transaksi Berhasil',
            'OK',
            function () {
              // Loading indicator with a message
              Notiflix.Loading.Standard('Loading...');
              setTimeout(function () {
                location.reload();
              });
            },
          );
        }
      });
    }
  });
</script>