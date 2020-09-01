<script>
  $(document).on('click', '.updateSales', function (e) {
    e.preventDefault();

    var updateSales = $(this).attr("id");
    //ajax
    $.ajax({
      url: "data-sales-ubah.php",
      type: 'POST',
      data: {
        updateSales: updateSales
      },
      success: function (data) {
        $('#infoUpdateSales').html(data);
        $('#modalEdit').modal('show');
      }
    });
  });

  $(document).on('click', '#editSales', function () {
    //jika sukses
      $.ajax({
        url: "../query/edit-data-sales.php",
        type: 'POST',
        data: $('#editForm').serialize(),
        success: function (data) {
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
  });
</script>