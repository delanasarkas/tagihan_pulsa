<script>
  $(document).on('click', '.detailPelanggan', function (e) {
    e.preventDefault();

    var detailPelanggan = $(this).attr("id");
    //ajax
    $.ajax({
      url: "data-pelanggan-detail.php",
      type: 'POST',
      data: {
        detailPelanggan: detailPelanggan
      },
      success: function (data) {
        $('#infoDetailPelanggan').html(data);
        $('#modalDetail').modal('show');
      }
    });
  });
</script>