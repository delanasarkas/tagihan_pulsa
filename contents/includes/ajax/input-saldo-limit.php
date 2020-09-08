<script>
$(document).ready(function() { 
    $("#simpanButton").click(function(e){
        e.preventDefault();
		    var data = $('#formInput').serialize();
        
        //variable
        var NamaSales = $('.namasales').val();
        var validNamaSales = true;
        var NominalSaldo = $('.nominalsaldopengiriman').val().replace(".", "").replace(".", "");
        var validNominalSaldo = true;

        //validasi nama sales
        if(NamaSales == "Pilih Nama Sales"){
          $('#errorNamaSales').html('Nama sales tidak boleh kosong');
          validNamaSales = false;
        }

        //validasi nominal saldo
        if(NominalSaldo== ""){
          $('#errorNominalSaldo').html('Nominal saldo tidak boleh kosong');
          validNominalSaldo= false;
        }else if(NominalSaldo < 100000 || NominalSaldo > 5000000){
          $('#errorNominalSaldo').html('Minimal saldo pengiriman Rp 100.000 dan maksimal pengiriman Rp 5.000.000');
          validNominalSaldo= false;
        }

        //jika validasi sukses
        if(validNamaSales && validNominalSaldo){
          //ajax
          $.ajax({
              url:"../query/input-saldo-limit.php",
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