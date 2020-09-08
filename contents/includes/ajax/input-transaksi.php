<script>
$(document).ready(function() { 
    $("#simpanButton").click(function(e){
        e.preventDefault();
	      var data = $('#formInput').serialize();
        
        //variable
        var KodePenembakan = $('#kodepenembakan').val();
        var validKodePenembakan = true;
        var NamaPelanggan = $('.namapelangganinput').val();
        var validNamaPelanggan = true;
        var JumlahTransaksi = $('#jumlahtransaksipenembakan').val().replace('.','').replace('.','').replace('-','');
        var validJumlahTransaksi = true;
        var SaldoSales = $('#saldosales').val().replace('.','').replace('.','').replace('-','');
        var validSaldoSales = true;

        //validasi kode penembakan
        if(KodePenembakan == ""){
          $('#errorKodePenembakanInput').html('Kode penembakan tidak boleh kosong');
          validKodePenembakan = false;
        }

        //validasi nama pelanggan
        if(NamaPelanggan== "Pilih Nama Pelanggan"){
          $('#errorNamaPelangganInput').html('Nama pelanggan tidak boleh kosong');
          validNamaPelanggan= false;
        }

        //validasi jumlah transaksi
        if(JumlahTransaksi== ""){
          $('#errorJumlahTransaksi').html('Jumlah transaksi tidak boleh kosong');
          validJumlahTransaksi= false;
        }else if(JumlahTransaksi < 100000 || JumlahTransaksi > 5000000){
          $('#errorJumlahTransaksi').html('Jumlah transaksi minimal Rp 100.000 dan maksimal Rp 5.000.000');
          validJumlahTransaksi= false;
        }

        //validasi total
        if(JumlahTransaksi > SaldoSales){
            $('#errorJumlahTransaksi').html('Jumlah saldo anda kurang');
            validSaldoSales= false;
        }

        //jika validasi sukses
        if(validKodePenembakan && validNamaPelanggan && validJumlahTransaksi && validSaldoSales){
          //ajax
          $.ajax({
              url:"../query/input-data-transaksi-baru.php",
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