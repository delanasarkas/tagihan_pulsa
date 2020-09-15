<script>
  $(document).on('click', '.detailKonfirmasi', function (e) {
    e.preventDefault();

    var detailKonfirmasi = $(this).attr("id");
    //ajax
    $.ajax({
      url: "konfirmasi-setoran-detail.php",
      type: 'POST',
      data: {
        detailKonfirmasi: detailKonfirmasi
      },
      success: function (data) {
        $('#infoDetailKonfirmasi').html(data);
        $('#modalDetail').modal('show');
      }
    });
  });
</script>