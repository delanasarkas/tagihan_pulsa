<script>
  $(document).on('click', '.konfirmasiTolak', function (e) {
    e.preventDefault();

    var konfirmasiTolak = $(this).attr("id");
    //ajax
    $.ajax({
      url: "konfirmasi-setoran-tolak.php",
      type: 'POST',
      data: {
        konfirmasiTolak: konfirmasiTolak
      },
      success: function (data) {
        $('#infoKonfirmasiTolak').html(data);
        $('#modalTolak').modal('show');
      }
    });
  });

  $(document).on('click', '#tolakButton', function () {
    //variable
    var pesanAdmin = $('#keteranganditolak').val();
    var validpesanAdmin= true;

    //validasi kode penembakan
    if(pesanAdmin == ""){
        $('#errorPesan').html('Pesan Konfirmasi tidak boleh kosong');
        validpesanAdmin = false;
    }

    if(validpesanAdmin){
    //jika sukses
      $.ajax({
        url: "../query/tolak-konfirmasi.php",
        type: 'POST',
        data: $('#tolakForm').serialize(),
        success: function (data) {
          $('#modalTolak').modal('hide');
          Notiflix.Report.Success(
            'Pesan Konfirmasi',
            'Konfirmasi Tolak Berhasil',
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
    }
  });
</script>