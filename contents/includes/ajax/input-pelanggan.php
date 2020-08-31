<script>
$(document).ready(function() { 
    $("#simpanButton").click(function(e){
        e.preventDefault();
			  var data = $('#formInput').serialize();
        
        //variable
        var NamaPelanggan = $('#nama_pelanggan').val();
        var validNamaPelanggan = true;
        var AlamatPelanggan = $('#alamat_pelanggan').val();
        var validAlamatPelanggan = true;
        var NomorTelepon = $('#nomor_telepon').val();
        var validNomorTelepon = true;

        //validasi nama pelanggan
        if(NamaPelanggan == ""){
          $('#errorNamaPelanggan').html('Nama pelanggan tidak boleh kosong');
          validNamaPelanggan = false;
        }else if(!isNaN(NamaPelanggan)){
          $('#errorNamaPelanggan').html('Karakter harus huruf');
          validNamaPelanggan = false;
        }else if(NamaPelanggan.length < 3){
          $('#errorNamaPelanggan').html('Panjang minimal input 3 karakter');
          validNamaPelanggan = false;
        }

        //validasi alamat
        if(AlamatPelanggan == ""){
          $('#errorAlamatPelanggan').html('Alamat pelanggan tidak boleh kosong');
          validAlamatPelanggan = false;
        }else if(AlamatPelanggan.length < 10){
          $('#errorAlamatPelanggan').html('Panjang minimal input 10 karakter');
          validAlamatPelanggan = false;
        }

        //validasi no tlp
        if(NomorTelepon== ""){
          $('#errorNomorTelepon').html('Nomor telepon tidak boleh kosong');
          validNomorTelepon= false;
        }else if(isNaN(NomorTelepon)){
          $('#errorNomorTelepon').html('Karakter harus angka');
          validNomorTelepon= false;
        }else if(NomorTelepon.length < 11 || NomorTelepon.length > 12 ){
          $('#errorNomorTelepon').html('Panjang minimal input 11 karakter dan maksimal input 12 karakter');
          validNomorTelepon= false;
        }

        //jika validasi sukses
        if(validNamaPelanggan && validAlamatPelanggan && validNomorTelepon){
          //ajax
          $.ajax({
              url:"../query/input-data-pelanggan.php",
              type: 'POST',
              data: data,           
              success: function() {             
                $('#modalCreate').modal('hide');
                Notiflix.Report.Success(
                  'Pesan Konfirmasi',
                  'Tambah Data Berhasil',
                  'OK',
                  function(){
                    // Loading indicator with a message
                    Notiflix.Loading.Standard('Loading...');
                    setTimeout(function(){
                      location.reload();
                    });
                  },
                );
              }
          });
        }
    });
})
</script>