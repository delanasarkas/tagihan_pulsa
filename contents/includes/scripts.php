<!--   Core JS Files   -->
<script src="../../assets/dashboard/js/datatables/jquery.js"></script>
<script src="../../assets/dashboard/js/core/popper.min.js"></script>
<script src="../../assets/dashboard/js/core/bootstrap.min.js"></script>
<script src="../../assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="../../assets/dashboard/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/dashboard/js/plugins/bootstrap-notify.js"></script>
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
<!-- Toast -->
<script src="../../assets/js/login/notiflix-2.4.0.min.js"></script>
<script>
  // Init the Confirm Module
  Notiflix.Notify.Init({
    position:'right-bottom',
    useFontAwesome:true,
  });
</script>
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
  //get tanggal transaksi penembakan
  $(document).ready(function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    document.getElementById("tanggalpenembakan").value = today;
  });
  //get tanggal saldo limit
  $(document).ready(function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    document.getElementById("tanggaltambahsaldo").valueAsDate = today;
  });
  //get tanggal setoran sales
  $(document).ready(function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    document.getElementById("tanggalsetoran").value = today;
  });
</script>

<script>
  $(document).ready(function () {
    var tommorow = new Date();
    var dd = String(tommorow.getDate() + 3).padStart(2, '0');
    var mm = String(tommorow.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = tommorow.getFullYear();

    tommorow = yyyy + '-' + mm + '-' + dd;

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
    if (document.getElementById("single3").value == "Pilih Kode Penembakan") {
      document.getElementById("feedbackpenamabahanpenembakan").classList.remove("valid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").classList.add("invalid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").innerHTML = "Harap pilih kode penembakan";
    } else {
      document.getElementById("feedbackpenamabahanpenembakan").classList.remove("invalid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").classList.add("valid-feedback");
      document.getElementById("feedbackpenamabahanpenembakan").innerHTML = "Kode penembakan sudah dipilih";
    }
  }
</script>
<!-- tambah setoran -->
<script>
  function generate4() {
    if (document.getElementById("single4").value == "Pilih Kode Invoice") {
      document.getElementById("feedbacksetoransales").classList.remove("valid-feedback");
      document.getElementById("feedbacksetoransales").classList.add("invalid-feedback");
      document.getElementById("feedbacksetoransales").innerHTML = "Harap pilih kode invoice";
    } else {
      document.getElementById("feedbacksetoransales").classList.remove("invalid-feedback");
      document.getElementById("feedbacksetoransales").classList.add("valid-feedback");
      document.getElementById("feedbacksetoransales").innerHTML = "Kode invoice sudah dipilih";
    }
  }
</script>
<!-- input saldo limit -->
<script>
  function generate3() {
    if (document.getElementById("single2").value == "Pilih Nama Sales") {
      document.getElementById("feedbacksaldolimit").classList.remove("valid-feedback");
      document.getElementById("feedbacksaldolimit").classList.add("invalid-feedback");
      document.getElementById("feedbacksaldolimit").innerHTML = "Harap pilih nama sales";
    } else {
      document.getElementById("feedbacksaldolimit").classList.remove("invalid-feedback");
      document.getElementById("feedbacksaldolimit").classList.add("valid-feedback");
      document.getElementById("feedbacksaldolimit").innerHTML = "Nama sales sudah dipilih";
    }
  }
</script>
<!-- select2 fungsi -->
<!-- data baru transaksi penembakan -->
<script>
  $("#single, #single2,#single3,#single4").select2({
    theme: "bootstrap"
  });
  $("#single5").select2({
    theme: "bootstrap",
    // disabled:readonly
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
<!-- autfocus invoice -->
<script>
  $('#modalSetor').on('shown.bs.modal', function () {
    $('#jumlahsetoran').trigger('focus')
  });
</script>
<!-- autfocus data pelanggan -->
<script>
  $('#modalCreate').on('shown.bs.modal', function () {
    $('#namapelanggan').trigger('focus')
  });
</script>
<!-- autfocus setoran -->
<script>
  $('#modalCreate').on('shown.bs.modal', function () {
    $('#jumlahsetoran').trigger('focus')
  });
</script>
<!-- autfocus tolak setoran -->
<script>
  $('#modalTolak').on('shown.bs.modal', function () {
    $('#keteranganditolak').trigger('focus')
  });
</script>
<!-- autfocus terima setoran -->
<script>
  $('#modalTerima').on('shown.bs.modal', function () {
    $('#keteranganditerima').trigger('focus')
  });
</script>
<!-- pencarian navbar -->
<script>
$("#cari2").on('click', function(event) {
  event.preventDefault();
  var x = $('#cari').val().toLowerCase();

  if(x == "dashboard"){
    window.location.href = "dashboard";
  } else if(x == "transaksi penembakan"){
    window.location.href = "transpenembakan";
  } else if(x == "history penembakan"){
    window.location.href = "historypenembakan";
  } else if(x == "saldo limit"){
    window.location.href = "saldolimit";
  } else if(x == "setoran sales"){
    window.location.href = "setoransales";
  } else if(x == "konfirmasi setoran"){
    window.location.href = "konfirmasisetoran";
  } else if(x == "bukti transfer"){
    window.location.href = "buktitransfer";
  } else if(x == "invoice sales"){
    window.location.href = "invoicesales";
  } else if(x == "data pelanggan"){
    window.location.href = "datapelanggan";
  } else if(x == "data sales"){
    window.location.href = "datasales";
  } else if(x == "report data"){
    window.location.href = "reportdata";
  } else {
    $('#cari').val(null);
    Notiflix.Notify.Failure('Pencarian tidak ada');
  }
});
</script>