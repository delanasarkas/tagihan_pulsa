<script>
  $(document).on('click', '.detailBukti', function (e) {
    e.preventDefault();

    var detailBukti = $(this).attr("id");
    //ajax
    $.ajax({
      url: "bukti-transfer-detail.php",
      type: 'POST',
      data: {
        detailBukti: detailBukti
      },
      success: function (data) {
        $('#infoDetailBukti').html(data);
        $('#modalDetail').modal('show');
      }
    });
  });
</script>