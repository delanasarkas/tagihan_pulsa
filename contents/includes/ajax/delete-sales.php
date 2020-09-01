<script>
  $(document).on('click', '.deleteSales', function (e) {
    e.preventDefault();

    var deleteSales = $(this).attr("id");
    //ajax
    $.ajax({
      url: "data-sales-hapus.php",
      type: 'POST',
      data: {
        deleteSales: deleteSales
      },
      success: function (data) {
        $('#infoDeleteSales').html(data);
        $('#modalDelete').modal('show');
      }
    });
  });

  $(document).on('click', '#deleteSales', function () {
    var data = $('#deleteForm').serialize();
    $.ajax({
      url: "../query/delete-data-sales.php",
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