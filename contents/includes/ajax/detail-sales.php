<script>
  $(document).on('click', '.detailSales', function (e) {
    e.preventDefault();

    var detailSales = $(this).attr("id");
    console.log(detailSales);
    //ajax
    $.ajax({
      url: "data-sales-detail.php",
      type: 'POST',
      data: {
        detailSales: detailSales
      },
      success: function (data) {
        $('#infoDetailSales').html(data);
        $('#modalDetail').modal('show');
      }
    });
  });
</script>