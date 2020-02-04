      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ViscaTI Software Solutions 2019 - <?php echo date('Y', time()); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Seleccione <strong>"Cerrar Sesión"</strong> si esta listo para terminar con la sesión actual.
          De lo contrario, presione <strong>"Continuar"</strong>.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Continuar</button>
          <a class="btn btn-primary" href="?do=logout">Cerrar Sesion</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Logout Modal-->
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <!-- <script src="assets/js/popper.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/datatables/buttons.bootstrap4.min.js"></script>
  <script src="assets/vendor/datatables/buttons.flash.min.js"></script>
  <script src="assets/vendor/datatables/jszip.min.js"></script>
  <script src="assets/vendor/datatables/pdfmake.min.js"></script>
  <script src="assets/vendor/datatables/vfs_fonts.js"></script>
  <script src="assets/vendor/datatables/buttons.html5.min.js"></script>
  <script src="assets/vendor/datatables/buttons.print.min.js"></script>
  <script src="assets/vendor/datatables/buttons.colVis.min.js"></script>
  <script src="assets/js/bootstrap-select.min.js"></script>
  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="assets/js/i18n/defaults-es_ES.min.js"></script>
  
  <!-- Page level custom scripts -->
  <script src='assets/js/moment.min.js'></script>
  <script src='assets/locale/es-do.js'></script>
<!--   <script src="assets/js/transition.js"></script>
  <script src="assets/js/collapse.js"></script> -->
  <script src="assets/js/tempusdominus-bootstrap-4.js"></script>

  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>
  <script src="assets/js/demo/datatables-demo.js"></script>
  <script src="assets/js/valida.js"></script>
  <script type="text/javascript">
    $('#editUserModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('id'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('a.btn.btn-warning').attr('href', recipient);
  });
    $('#editRadioModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('id'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('a.btn.btn-primary').attr('href', recipient);
  });
</script>

<script type="text/javascript">
  $(function () {
    $('#fecha_hecho').datetimepicker({
      useCurrent: false
    });
    $('#fecha_reporte').datetimepicker({
      useCurrent: false
    });
    $("#fecha_hecho").on("change.datetimepicker", function (e) {
      $('#fecha_reporte').datetimepicker('minDate', e.date);
    });
    $("#fecha_reporte").on("change.datetimepicker", function (e) {
      $('#fecha_hecho').datetimepicker('maxDate', e.date);
    });
  });
</script>

<script type="text/javascript">
  $(function () {
    //seleccionar opciones
    $('body').on('click', '.list-group .list-group-item', function () {
      var $checkBox = $(this);
      if (!$checkBox.hasClass('active')) {
        $checkBox.toggleClass('active').closest('.well').find('ul li.active').toggleClass('active');
        $(this).toggleClass('active');
      }
    });
    //modal
    $('body').on('click', '.list-right .list-group .list-group-item', function () {
      var $opt = $(this);
      if ($opt.hasClass('bat')) {
          $('#bateriaModal').modal();
        }else if ($opt.hasClass('eng')){
          $('#engordeModal').modal();
        }else if ($opt.hasClass('mat')) {
          $('#maternidadModal').modal();
        }else if ($opt.hasClass('rec')) {
          $('#recriaModal').modal();
        }
    });
    $('.list-arrows button').click(function () {
      // $('#bateriaModal').modal()
      var $b = $(this), modal = '';
      if ($b.hasClass('move-right')) {
        modal = $('.list-left ul li.active');
        if (modal.hasClass('bat')) {
          $('#bateriaModal').modal();
        }else if (modal.hasClass('eng')){
          $('#engordeModal').modal();
        }else if (modal.hasClass('mat')) {
          $('#maternidadModal').modal();
        }else if (modal.hasClass('rec')) {
          $('#recriaModal').modal();
        }
      } 
    });
    //pasar a izquierda o derecha
    $('.list-arrows button').click(function () {
      var $button = $(this), actives = '';
      if ($button.hasClass('move-left')) {
        actives = $('.list-right ul li.active');
        actives.toggleClass('active');
        actives.clone().appendTo('.list-left ul');
        actives.remove();
      } else if ($button.hasClass('move-right')) {
        actives = $('.list-left ul li.active');
        actives.clone().appendTo('.list-right ul');
        actives.remove();
      }
    });
  });
</script>
</body>
</html>