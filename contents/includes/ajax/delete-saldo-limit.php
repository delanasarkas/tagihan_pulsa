<script>
  $(document).on('click', '.deleteSaldoLimit', function (e) {
    e.preventDefault();

    var deleteSaldoLimit = $(this).attr("id");
    //ajax
    $.ajax({
      url: "saldo-limit-hapus.php",
      type: 'POST',
      data: {
        deleteSaldoLimit: deleteSaldoLimit
      },
      success: function (data) {
        $('#infoDeleteSaldoLimit').html(data);
        $('#modalDelete').modal('show');
      }
    });
  });

  $(document).on('click', '#deleteSaldoLimit', function () {
    var data = $('#deleteForm').serialize();
    $.ajax({
      url: "../query/delete-saldo-limit.php",
      type: 'POST',
      data: data,
      success: function (data) {
        $('#modalDelete').modal('hide');
        Notiflix.Report.Success(
          'Pesan Konfirmasi',
          'Hapus Data Berhasil',
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