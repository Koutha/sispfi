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
<!-- //script para seleccionar seccion del robo -->
<script src="assets/js/dualBoxList-bySmital.js"></script>
<script type="text/javascript">
	$('#novedadesForm').submit(function(event){
		var attr = $('[name=bateria]').attr('disabled');
		if (typeof attr !== typeof undefined && attr !== false) {
    	$('#n1').fadeIn().fadeOut(10000);
    	alert('faltan datos');
    	event.preventDefault();
  	}
  	
  	/*$.fn.hasAttr = function(attr) { 
  		var attribVal = this.attr(attr); 
  		return (attribVal !== undefined) && (attribVal !== false); };*/
});
</script>
</body>
</html>