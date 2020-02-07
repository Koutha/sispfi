$(function () {
	//marcar opciones como seleccionadas al hacerles click 
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
				$('#bateriaModal').modal(); //carga el modal
				//activar inputs aqui
				$('[name=cantidad_B]').prop("disabled",  false);
				$('[name=kilos_B]').prop("disabled",  false);
				$('[name=ubicacion_B]').prop("disabled",  false);
				$('#dismissB').hide(); //ocultar boton quitar
				$('#Add').on('click', function(){ //pasa el item al lado derecho
					$('[name=bateria]').prop("disabled",  false); //activar el input para que sea enviado por post
					$('#dismissB').show(1500); //mostrar boton para quitar
					//meter validaciones a los campos aqui
					var itemAdd = $('.list-left ul li.active');
					itemAdd.clone().appendTo('.list-right ul');
					itemAdd.remove();
				});
			}else if (itemLeft.hasClass('eng')){
				$('#engordeModal').modal();
				//activar inputs aqui
				$('[name=cantidad_E]').prop("disabled",  false);
				$('[name=kilos_E]').prop("disabled",  false);
				$('[name=ubicacion_E]').prop("disabled",  false);
				$('#engordeModal .modal-footer .btn-primary').on('click', function(){
					$('[name=engorde]').prop("disabled",  false); //activar el input para que sea enviado por post
					//meter validaciones a los campos aqui
					var itemAdd = $('.list-left ul li.active');
					itemAdd.clone().appendTo('.list-right ul');
					itemAdd.remove();
				});
			}else if (itemLeft.hasClass('mat')) {
				$('#maternidadModal').modal();
				//activar inputs aqui
				$('[name=cantidad_M]').prop("disabled",  false);
				$('[name=kilos_M]').prop("disabled",  false);
				$('[name=ubicacion_M]').prop("disabled",  false);
				$('#maternidadModal .modal-footer .btn-primary').on('click', function(){
					$('[name=maternidad]').prop("disabled",  false); //activar el input para que sea enviado por post
					//meter validaciones a los campos aqui
					var itemAdd = $('.list-left ul li.active');
					itemAdd.clone().appendTo('.list-right ul');
					itemAdd.remove();
				});
			}else if (itemLeft.hasClass('rec')) {
				$('#recriaModal').modal();
				//activar inputs aqui
				$('[name=cantidad_R]').prop("disabled",  false);
				$('[name=kilos_R]').prop("disabled",  false);
				$('[name=ubicacion_R]').prop("disabled",  false);
				$('#recriaModal .modal-footer .btn-primary').on('click', function(){
					$('[name=recria]').prop("disabled",  false); //activar el input para que sea enviado por post
					//meter validaciones a los campos aqui
					var itemAdd = $('.list-left ul li.active');
					itemAdd.clone().appendTo('.list-right ul');
					itemAdd.remove();
				});
			}
		} 
	});

	//cargar modal al hacer click en los items cuando estan del lado derecho
	$('body').on('click', '.list-right .list-group .list-group-item', function () {
		var $opt = $(this);
		if ($opt.hasClass('bat')) {
			$('#bateriaModal').modal();
			$('#dismissB').on('click', function(){ //quitar elemento de la lista y desactivar inputs
				var actives = '';
				actives = $('.list-right ul li.bat');
				actives.toggleClass('active');
				actives.clone().appendTo('.list-left ul');
				actives.remove();
				$('[name=bateria]').prop("disabled", true);
				$('[name=cantidad_B]').prop("disabled", true);
				$('[name=kilos_B]').prop("disabled", true);
				$('[name=ubicacion_B]').prop("disabled", true);
				$('#dismissB').hide(); //ocultar boton quitar
			});
		}else if ($opt.hasClass('eng')){
			$('#engordeModal').modal();
			$('#dismissE').on('click', function(){ //quitar elemento de la lista y desactivar inputs
				var actives = '';
				actives = $('.list-right ul li.eng');
				actives.toggleClass('active');
				actives.clone().appendTo('.list-left ul');
				actives.remove();
				$('[name=engorde]').prop("disabled", true);
				$('[name=cantidad_E]').prop("disabled", true);
				$('[name=kilos_E]').prop("disabled", true);
				$('[name=ubicacion_E]').prop("disabled", true);
				$('#dismissE').hide(); //ocultar boton quitar
			});
		}else if ($opt.hasClass('mat')) {
			$('#maternidadModal').modal();
			$('#dismissM').on('click', function(){ //quitar elemento de la lista y desactivar inputs
				var actives = '';
				actives = $('.list-right ul li.mat');
				actives.toggleClass('active');
				actives.clone().appendTo('.list-left ul');
				actives.remove();
				$('[name=maternidad]').prop("disabled", true);
				$('[name=cantidad_M]').prop("disabled", true);
				$('[name=kilos_M]').prop("disabled", true);
				$('[name=ubicacion_M]').prop("disabled", true);
				$('#dismissM').hide(); //ocultar boton quitar
			});
		}else if ($opt.hasClass('rec')) {
			$('#recriaModal').modal();
			$('#dismissR').on('click', function(){ //quitar elemento de la lista y desactivar inputs
				var actives = '';
				actives = $('.list-right ul li.rec');
				actives.toggleClass('active');
				actives.clone().appendTo('.list-left ul');
				actives.remove();
				$('[name=recria]').prop("disabled", true);
				$('[name=cantidad_R]').prop("disabled", true);
				$('[name=kilos_R]').prop("disabled", true);
				$('[name=ubicacion_R]').prop("disabled", true);
				$('#dismissR').hide(); //ocultar boton quitar
			})
		}
	});

	//pasar a izquierda o derecha
	$('.list-arrows button').click(function () {
		var $button = $(this), actives = '';
		if ($button.hasClass('move-left')) { //regresar todos los items al lado izquierdo
			//desactivar inputs aqui
			$('[name=bateria]').prop("disabled",  true);
			$('[name=cantidad_B]').prop("disabled", true);
			$('[name=kilos_B]').prop("disabled", true);
			$('[name=ubicacion_B]').prop("disabled", true);
			$('#dismissB').hide(); //ocultar boton quitar bateria
			$('[name=engorde]').prop("disabled",  true);
			$('[name=cantidad_E]').prop("disabled", true);
			$('[name=kilos_E]').prop("disabled", true);
			$('[name=ubicacion_E]').prop("disabled", true);
			$('#dismissE').hide(); //ocultar boton quitar engorde
			$('[name=maternidad]').prop("disabled",  true);
			$('[name=cantidad_M]').prop("disabled", true);
			$('[name=kilos_M]').prop("disabled", true);
			$('[name=ubicacion_M]').prop("disabled", true);
			$('#dismissM').hide(); //ocultar boton quitar maternidad
			$('[name=recria]').prop("disabled",  true);
			$('[name=cantidad_R]').prop("disabled", true);
			$('[name=kilos_R]').prop("disabled", true);
			$('[name=ubicacion_R]').prop("disabled", true);
			$('#dismissR').hide(); //ocultar boton quitar recria
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