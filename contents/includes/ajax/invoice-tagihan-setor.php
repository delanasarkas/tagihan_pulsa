<script>
  $(document).on('click', '.setorInvoice', function (e) {
    e.preventDefault();

    var setorInvoice = $(this).attr("id");
    //ajax
    $.ajax({
      url: "invoice-sales-setor.php",
      type: 'POST',
      data: {
        setorInvoice: setorInvoice
      },
      success: function (data) {
        $('#infoSetorInvoice').html(data);
        $('#modalSetor').modal('show');
      }
    });
  });

  $(document).on('click', '#setorButton', function (e) {
    e.preventDefault();
    var data = $('#setorForm').serialize();
    //variable
    var limitSaldo = $('#limitsaldo').val().replace('.','').replace('.','').replace('-','');
    var validlimitSaldo = true;
    var jumlahSetoran = $('#jumlahsetoran').val().replace('.','').replace('.','').replace('-','');
    var validjumlahSetoran = true;

    if(jumlahSetoran == ""){
      $('#errorSetoran').html('Jumlah setoran tidak boleh kosong');
      validjumlahSetoran = false;
    }

    if(Number(jumlahSetoran) > Number(limitSaldo)){
      $('#errorSetoran').html('Jumlah setoran melebihi saldo pelanggan');
      validlimitSaldo = false;
      validjumlahSetoran = false;
    }

    //jika sukses
    if(validlimitSaldo && validjumlahSetoran){
      $.ajax({
        url: "../query/setor-invoice-tagihan.php",
        type: 'POST',
        data: data,
        success: function (data) {
          $('#modalSetor').modal('hide');
          Notiflix.Report.Success(
            'Pesan Konfirmasi',
            'Setoran sementara berhasil',
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