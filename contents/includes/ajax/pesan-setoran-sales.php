<script>
  $(document).on('click', '.pesanSetoran', function (e) {
    e.preventDefault();

    var pesanSetoran = $(this).attr("id");

    //ajax
    $.ajax({
      url: "setoran-sales-pesan.php",
      type: 'POST',
      data: {
        pesanSetoran: pesanSetoran
      },
      success: function (data) {
        $('#infoPesanSetoran').html(data);
        $('#modalPesan').modal('show');
      }
    });
  });
</script>