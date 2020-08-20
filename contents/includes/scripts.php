<!--   Core JS Files   -->
<script src="../../assets/dashboard/js/datatables/jquery.js"></script>
<script src="../../assets/dashboard/js/core/popper.min.js"></script>
<script src="../../assets/dashboard/js/core/bootstrap.min.js"></script>
<script src="../../assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="../../assets/dashboard/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/dashboard/js/plugins/bootstrap-notify.js"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/dashboard/demo/demo.js"></script>
<!-- Datatable -->
<script src="../../assets/dashboard/js/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/dashboard/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/dashboard/js/datatables/dataTables.rowReorder.min.js"></script>
<script src="../../assets/dashboard/js/datatables/dataTables.responsive.min.js"></script>
<script src="../../assets/dashboard/js/datatables/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="../../assets/dashboard/js/select2/select2.min.js"></script>
<!-- jquery mask -->
<script src="../../assets/dashboard/js/jquery-mask.js"></script>
<script src="../../assets/dashboard/js/terbilang.js"></script>
<!-- chart -->
<script src="../../assets/dashboard/js/chartjs/chart.min.js"></script>
<script src="../../assets/dashboard/js/chartjs/utils.js"></script>
<script>
  $(document).ready(function () {
    var table = $('#example').DataTable({
      responsive: true,
      "scrollX": true,
      language: {
        search: "<i class='fas fa-search'></i>",
        searchPlaceholder: "Cari Data"
      }
    });
  });
</script>
<!-- ------------------------------------------------------------------------------------------ -->
<script>
  $(document).ready(function () {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
</script>
<!-- tooltip -->
<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<!-- get tanggal -->
<script>
  $(document).ready(function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    document.getElementById("tanggalpenembakan").value = today;
    document.getElementById("tanggaltambahsaldo").value = today;
    // document.getElementById("tanggalpenagihan").value = tomorrow;
  });
</script>
<script>
  $(document).ready(function () {
    var tommorow = new Date();
    var dd = String(tommorow.getDate() + 3).padStart(2, '0');
    var mm = String(tommorow.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = tommorow.getFullYear();

    tommorow = mm + '/' + dd + '/' + yyyy;

    document.getElementById("tanggalpenagihan").value = tommorow;
    // document.getElementById("tanggalpenagihan").value = tomorrow;
  });
</script>
<script>
  $(':input[readonly]').css({
    'background-color': 'white'
  });
</script>
<!-- generate penembakan -->
<script>
  function generate() {
    String.random = function (length) {
      let radom13chars = function () {
        return Math.random().toString(16).substring(2, 15)
      }
      let loops = Math.ceil(length / 13)
      return new Array(loops).fill(radom13chars).reduce((string, func) => {
        return string + func()
      }, '').substring(0, length)
    }

    document.getElementById("kodepenembakan").value = String.random(7);
    document.getElementById("kodepenembakan").classList.remove("is-invalid");
    document.getElementById("kodepenembakan").classList.add("is-valid");
    document.getElementById("feedbackpenembakan").classList.remove("invalid-feedback");
    document.getElementById("feedbackpenembakan").classList.add("valid-feedback");
    document.getElementById("feedbackpenembakan").innerHTML = "Kode sudah digenerate";
  }
</script>
<!-- penambahan transaksi penembakan -->
<script>
  function generate2() {
    if(document.getElementById("single3").value == "Pilih Kode Penembakan"){
      document.getElementById("feedbackpenamabahanpenembakan").classList.remove("valid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").classList.add("invalid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").innerHTML = "Harap pilih kode penembakan";
    } else{
      document.getElementById("feedbackpenamabahanpenembakan").classList.remove("invalid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").classList.add("valid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").innerHTML = "Kode penembakan sudah dipilih";
    }
  }
</script>
<!-- input saldo limit -->
<script>
  function generate3() {
    if(document.getElementById("single").value == "Pilih Nama Sales"){
      document.getElementById("feedbacksaldolimit").classList.remove("valid-feedback");
      document.getElementById("feedbacksaldolimit").classList.add("invalid-feedback");
      document.getElementById("feedbacksaldolimit").innerHTML = "Harap pilih nama sales";
    } else{
      document.getElementById("feedbacksaldolimit").classList.remove("invalid-feedback");
      document.getElementById("feedbacksaldolimit").classList.add("valid-feedback");
      document.getElementById("feedbacksaldolimit").innerHTML = "Nama sales sudah dipilih";
    }
  }
</script>
<!-- select2 fungsi -->
<!-- data baru transaksi penembakan -->
<script>
  $("#single, #single2,#single3").select2({
    theme: "bootstrap"
  });
</script>
<!-- autfocus transaksi penembakan -->
<script>
$('#modalCreate, #modalCreatePenambahan').on('shown.bs.modal', function () {
  $('#jumlahtransaksipenembakan, #jumlahpenambahantransaksipenembakan').trigger('focus')
});
</script>
<!-- autfocus saldo limit -->
<script>
$('#modalCreate, #modalCreatePenambahan').on('shown.bs.modal', function () {
  $('#nominalsaldopengiriman').trigger('focus')
});
</script>
<!-- autfocus data pelanggan -->
<script>
$('#modalCreate').on('shown.bs.modal', function () {
  $('#namapelanggan').trigger('focus')
});
</script>