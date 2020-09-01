<script>
  $(document).on('click', '.deletePelanggan', function (e) {
    e.preventDefault();

    var deletePelanggan = $(this).attr("id");
    //ajax
    $.ajax({
      url: "data-pelanggan-hapus.php",
      type: 'POST',
      data: {
        deletePelanggan: deletePelanggan
      },
      success: function (data) {
        $('#infoDeletePelanggan').html(data);
        $('#modalDelete').modal('show');
      }
    });
  });

  $(document).on('click', '#deletePelanggan', function () {
    var data = $('#deleteForm').serialize();
    $.ajax({
      url: "../query/delete-data-pelanggan.php",
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