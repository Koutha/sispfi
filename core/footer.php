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
  <script type="text/javascript"> //script para pasarle el atributo "id" al modal
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

<script type="text/javascript"> //script para inicializar el pluggin para la fecha
$(function () {
  $('#fecha_hecho').datetimepicker({
    useCurrent: false
  });
  $('#fecha_reporte').datetimepicker({
    useCurrent: false
  });
    //vincular las fechas fecha_reporte no sea menor a la fecha_hecho
    $("#fecha_hecho").on("change.datetimepicker", function (e) {
      $('#fecha_reporte').datetimepicker('minDate', e.date);
    });
    //vincular las fechas fecha_hecho no sea mayor a la del reporte
    $("#fecha_reporte").on("change.datetimepicker", function (e) {
      $('#fecha_hecho').datetimepicker('maxDate', e.date);
    });
  });
</script>

<script type="text/javascript"> //script para seleccionar seccion del robo
$(function () {
    //seleccionar opciones
    $('body').on('click', '.list-group .list-group-item', function () {
      var $checkBox = $(this);
      if (!$checkBox.hasClass('active')) {
        $checkBox.toggleClass('active').closest('.well').find('ul li.active').toggleClass('active');
        $(this).toggleClass('active');
      }
    });
    //cargar el modal del item seleccionado al hacer click para pasarlo al lado derecho
    $('.list-arrows button').click(function () {
      var $b = $(this), itemLeft = '';
      if ($b.hasClass('move-right')) {
        itemLeft = $('.list-left ul li.active');
        if (itemLeft.hasClass('bat')) {
          $('#bateriaModal').modal();
          $('#Add').on('click', function(){
            //activar inputs aqui
            //meter validaciones a los campos aqui
            var itemAdd = $('.list-left ul li.active');
            itemAdd.toggleClass('active');
            itemAdd.clone().appendTo('.list-right ul');
            itemAdd.remove();
          });
          // $('#Dismiss').on('click', function(){
          //   itemLeft = $('.list-right ul li.active');
          //   itemLeft.toggleClass('active');
          //   itemLeft.clone().appendTo('.list-left ul');
          //   itemLeft.remove();
          // });
        }else if (itemLeft.hasClass('eng')){
          $('#engordeModal').modal();
          $('#engordeModal .modal-footer .btn-primary').on('click', function(){
            //activar inputs aqui
            //meter validaciones a los campos aqui
            var itemAdd = $('.list-left ul li.active');
            itemAdd.toggleClass('active');
            itemAdd.clone().appendTo('.list-right ul');
            itemAdd.remove();
          });
        }else if (itemLeft.hasClass('mat')) {
          $('#maternidadModal').modal();
          $('#maternidadModal .modal-footer .btn-primary').on('click', function(){
            //activar inputs aqui
            //meter validaciones a los campos aqui
            var itemAdd = $('.list-left ul li.active');
            itemAdd.toggleClass('active');
            itemAdd.clone().appendTo('.list-right ul');
            itemAdd.remove();
          });
        }else if (itemLeft.hasClass('rec')) {
          $('#recriaModal').modal();
          $('#recriaModal .modal-footer .btn-primary').on('click', function(){
            //activar inputs aqui
            //meter validaciones a los campos aqui
            var itemAdd = $('.list-left ul li.active');
            itemAdd.toggleClass('active');
            itemAdd.clone().appendTo('.list-right ul');
            itemAdd.remove();
          });
        }
      } 
    });

    //cargar modal al hacer click en los items de la derecha
    $('body').on('click', '.list-right .list-group .list-group-item', function () {
      var $opt = $(this);
      if ($opt.hasClass('bat')) {
        $('#bateriaModal').modal();
          // $('[name=bateria]').prop("disabled",  false); //activar el input para que sea enviado por post
        }else if ($opt.hasClass('eng')){
          $('#engordeModal').modal();
        }else if ($opt.hasClass('mat')) {
          $('#maternidadModal').modal();
        }else if ($opt.hasClass('rec')) {
          $('#recriaModal').modal();
        }
      });

    //pasar a izquierda o derecha
    $('.list-arrows button').click(function () {
      var $button = $(this), actives = '';
      if ($button.hasClass('move-left')) {
        //desactivar inputs aqui
        actives = $('.list-right ul li.active');
        actives.toggleClass('active');
        actives.clone().appendTo('.list-left ul');
        actives.remove();
      } /*else if ($button.hasClass('move-right')) {
        actives = $('.list-left ul li.active');
        actives.clone().appendTo('.list-right ul');
        actives.remove();
      }*/
    });
  });
</script>
</body>
</html>