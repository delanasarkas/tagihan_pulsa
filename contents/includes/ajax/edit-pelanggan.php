<script>
  $(document).on('click', '.updatePelanggan', function (e) {
    e.preventDefault();

    var updatePelanggan = $(this).attr("id");
    //ajax
    $.ajax({
      url: "data-pelanggan-ubah.php",
      type: 'POST',
      data: {
        updatePelanggan: updatePelanggan
      },
      success: function (data) {
        $('#infoUpdatePelanggan').html(data);
        $('#modalEdit').modal('show');
      }
    });
  });

  $(document).on('click', '#editPelanggan', function (e) {
    e.preventDefault();

    //variable
    var NamaPelanggan = $('.namapelanggan2').val();
    var validNamaPelanggan = true;
    var AlamatPelanggan = $('.alamatpelanggan2').val();
    var validAlamatPelanggan = true;
    var NomorTelepon = $('.nomortelepon2').val();
    var validNomorTelepon = true;

    //validasi nama pelanggan
    if (NamaPelanggan == "") {
      $('.errorNamaPelanggan2').html('Nama pelanggan tidak boleh kosong');
      validNamaPelanggan = false;
    } else if (!isNaN(NamaPelanggan)) {
      $('.errorNamaPelanggan2').html('Karakter harus huruf');
      validNamaPelanggan = false;
    } else if (NamaPelanggan.length < 3) {
      $('.errorNamaPelanggan2').html('Panjang minimal input 3 karakter');
      validNamaPelanggan = false;
    }

    //validasi alamat
    if (AlamatPelanggan == "") {
      $('.errorAlamatPelanggan2').html('Alamat pelanggan tidak boleh kosong');
      validAlamatPelanggan = false;
    } else if (AlamatPelanggan.length < 10) {
      $('.errorAlamatPelanggan2').html('Panjang minimal input 10 karakter');
      validAlamatPelanggan = false;
    }

    //validasi no tlp
    if (NomorTelepon == "") {
      $('.errorNomorTelepon2').html('Nomor telepon tidak boleh kosong');
      validNomorTelepon = false;
    } else if (isNaN(NomorTelepon)) {
      $('.errorNomorTelepon2').html('Karakter harus angka');
      validNomorTelepon = false;
    } else if (NomorTelepon.length < 11 || NomorTelepon.length > 12) {
      $('.errorNomorTelepon2').html('Panjang minimal input 11 karakter dan maksimal input 12 karakter');
      validNomorTelepon = false;
    }

    //jika sukses
    if(validNamaPelanggan && validAlamatPelanggan && validNomorTelepon){
      $.ajax({
        url: "../query/edit-data-pelanggan.php",
        type: 'POST',
        data: $('#editForm').serialize(),
        success: function (data) {
          $('#modalEdit').modal('hide');
          Notiflix.Report.Success(
            'Pesan Konfirmasi',
            'Ubah Data Berhasil',
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