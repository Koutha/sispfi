// Call the dataTables jQuery plugin
var idioma = {
	"lengthMenu": "Mostrar _MENU_ registros por página",
	"zeroRecords": "No se encontraron registros - disculpe",
	"info": "Mostrando del _START_ al _END_ de _TOTAL_ registros",
	"infoEmpty": "No hay registros",
	"infoFiltered": "(filtrado de _MAX_ registros totales)",
	"search":"Buscar:",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Ultimo",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior",
	},
	"buttons": {
		"copyTitle": 'Informacion copiada',
		"copyKeys": 'Use your keyboard or menu to select the copy command',
		"copySuccess": {
			"_": '%d registros copiados al portapapeles',
			"1": '1 registro copiado al portapapeles'
		},

		"pageLength": {
			"_": "Mostrar %d filas",
			"-1": "Mostrar Todo"
		}
	}
};

$(document).ready(function() {

	$('#dataTable').DataTable({
		"language": idioma,
		"lengthChange": true,
		"autoWidth": true,
		"lengthMenu": [[10,20,50, -1],[10,20,50,"Mostrar Todo"]],
		dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
		buttons: [
		{
			extend: 'pdfHtml5',
			download: 'open',
			text: '<i class="fa fa-file-pdf"></i> PDF',
			title: 'Inventario de radios',
			titleAttr: 'Exporta como documento en formato PDF',
			exportOptions: {
				columns: [ 0, ':visible' ],
				rows: ':visible'
			}
		},
		{
			extend: 'excelHtml5',
			text: '<i class="fa fa-file-excel"></i> Excel',
			title: 'Inventario de radios',
			titleAttr: 'Exportar como hoja de calculo Excel',
			exportOptions: {
				columns: [ 0, ':visible' ],
				rows: ':visible'
			}
		},
		{
			extend: 'print',
			text: '<i class="fa fa-print"></i> Imprimir',
			title:'Inventario de radios',
			titleAttr: 'Imprimir',
			exportOptions: {
				columns: [ 0, ':visible' ],
				rows: ':visible'
			}
		},
		'colvis',
		'pageLength'
		]
	});
});

// {
//   extend:    'pdfHtml5',
//   text:      '<i class="fa fa-file-pdf-o"></i>PDF',
//   title:'Titulo de tabla en pdf',
//   titleAttr: 'PDF',
//   className: 'btn btn-app export pdf',
//   exportOptions: {
//     columns: [ 0, 1 ]
//   },
//   customize:function(doc) {

//     doc.styles.title = {
//       color: '#4c8aa0',
//       fontSize: '30',
//       alignment: 'center'
//     }
//     doc.styles['td:nth-child(2)'] = { 
//       width: '100px',
//       'max-width': '100px'
//     },
//     doc.styles.tableHeader = {
//       fillColor:'#4c8aa0',
//       color:'white',
//       alignment:'center'
//     },
//     doc.content[1].margin = [ 100, 0, 100, 0 ]

//   }

// },