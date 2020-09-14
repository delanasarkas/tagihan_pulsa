<script>
  $(document).on('click', '.detailSetoran', function (e) {
    e.preventDefault();

    var detailSetoran = $(this).attr("id");

    //ajax
    $.ajax({
      url: "setoran-sales-detail.php",
      type: 'POST',
      data: {
        detailSetoran: detailSetoran
      },
      success: function (data) {
        $('#infoDetailSetoran').html(data);
        $('#modalDetail').modal('show');
      }
    });
  });
</script>