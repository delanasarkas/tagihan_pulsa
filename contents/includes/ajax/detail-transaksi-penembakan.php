<script>
  $(document).on('click', '.detailTransaksi', function (e) {
    e.preventDefault();

    var detailTransaksi = $(this).attr("id");

    //ajax
    $.ajax({
      url: "transaksi-penembakan-detail.php",
      type: 'POST',
      data: {
        detailTransaksi: detailTransaksi
      },
      success: function (data) {
        $('#infoDetailTransaksi').html(data);
        $('#modalDetail').modal('show');
      }
    });
  });
</script>