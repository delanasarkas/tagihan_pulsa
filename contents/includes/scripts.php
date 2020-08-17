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
  <script>
  $(document).ready(function() {
      var table = $('#example').DataTable( {
          responsive: true
      } );
  } );
  </script>
  <!-- ------------------------------------------------------------------------------------------ -->
  <script>
    $(document).ready(function () {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
  });
  </script>
  