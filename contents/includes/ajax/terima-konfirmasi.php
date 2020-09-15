<script>
  $(document).on('click', '.konfirmasiTerima', function (e) {
    e.preventDefault();

    var konfirmasiTerima = $(this).attr("id");
    //ajax
    $.ajax({
      url: "konfirmasi-setoran-terima.php",
      type: 'POST',
      data: {
        konfirmasiTerima: konfirmasiTerima
      },
      success: function (data) {
        $('#infoKonfirmasiTerima').html(data);
        $('#modalTerima').modal('show');
      }
    });
  });

  $(document).on('click', '#editButton', function () {
    //jika sukses
      $.ajax({
        url: "../query/terima-konfirmasi.php",
        type: 'POST',
        data: $('#editForm').serialize(),
        success: function (data) {
          $('#modalTerima').modal('hide');
          Notiflix.Report.Success(
            'Pesan Konfirmasi',
            'Konfirmasi Terima Berhasil',
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