<script>
  $(document).on('click', '.batalTransaksi', function (e) {
    e.preventDefault();

    var batalTransaksi = $(this).attr("id");
    //ajax
    $.ajax({
      url: "transaksi-penembakan-kembali.php",
      type: 'POST',
      data: {
        batalTransaksi: batalTransaksi
      },
      success: function (data) {
        $('#infoKembaliTransaksi').html(data);
        $('#modalKembali').modal('show');
      }
    });
  });

  $(document).on('click', '#konfirmasiKembali', function () {
    var data = $('#kembaliForm').serialize();
    $.ajax({
      url: "../query/kembalikan-transaksi-penembakan.php",
      type: 'POST',
      data: data,
      success: function (data) {
        $('#modalKembali').modal('hide');
        Notiflix.Report.Success(
          'Pesan Konfirmasi',
          'Kembalikan Transaksi Berhasil',
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
  });
</script>