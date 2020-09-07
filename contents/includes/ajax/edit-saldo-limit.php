<script>
  $(document).on('click', '.updateSaldoLimit', function (e) {
    e.preventDefault();

    var updateSaldoLimit = $(this).attr("id");
    //ajax
    $.ajax({
      url: "saldo-limit-ubah.php",
      type: 'POST',
      data: {
        updateSaldoLimit: updateSaldoLimit
      },
      success: function (data) {
        $('#infoUpdateSaldoLimit').html(data);
        $('#modalEdit').modal('show');
      }
    });
  });

  $(document).on('click', '#editSaldoLimit', function (e) {
    e.preventDefault();

    //variable
    var NamaSales2 = $('#single3').val();
    var validNamaSales2 = true;
    var NominalSaldo2 = $('#nominalsaldopengirimanubah').val().replace(".", "").replace(",", "").replace("-", "");;
    var validNominalSaldo2 = true;

    //validasi nama sales
    if (NamaSales2 == "Pilih Nama Sales") {
      $('#errorNamaSales2').html('Nama pelanggan tidak boleh kosong');
      validNamaSales2 = false;
    }

    //validasi nominal saldo
    if (NominalSaldo2 == "") {
      $('#errorNominalSaldo2').html('Nominal saldo tidak boleh kosong');
      validNominalSaldo2 = false;
    } else if (NominalSaldo2 < 100000 || NominalSaldo2 > 5000000) {
      $('#errorNominalSaldo2').html('Minimal saldo pengiriman Rp 100.000 dan maksimal pengiriman Rp 5.000.000');
      validNominalSaldo2 = false;
    }

    //jika sukses
    if (validNamaSales2 && validNominalSaldo2) {
      //ajax
      $.ajax({
        url: "../query/edit-saldo-limit.php",
        type: 'POST',
        data: $('#editForm').serialize(),
        success: function () {
          $('#modalEdit').modal('hide');
          Notiflix.Report.Success(
            'Pesan Konfirmasi',
            'Ubah Data Berhasil',
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