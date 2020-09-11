<script>
  $(document).on('click', '.detailInvoice', function (e) {
    e.preventDefault();

    var detailInvoice = $(this).attr("id");
    //ajax
    $.ajax({
      url: "invoice-sales-detail.php",
      type: 'POST',
      data: {
        detailInvoice: detailInvoice
      },
      success: function (data) {
        $('#infoDetailInvoice').html(data);
        $('#modalDetail').modal('show');
      }
    });
  });
</script>