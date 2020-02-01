<?php require_once('core/header.php'); ?>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php require_once('core/sideBar.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
          <?php require_once('core/topBar.php');?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Inventario de Radios</h1>
            <!-- <a href="?do=radioListReport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a> -->
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registrados en sistema</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style=" font-size: 14px;">Codigo de Usuario</th>
                      <th style=" font-size: 14px;">Centro de Trabajo</th>
                      <th style=" font-size: 14px;">Responsable</th>
                      <th style=" font-size: 14px;">Status</th>
                      <th style=" font-size: 14px;">Empresa</th>
                      <th style=" font-size: 14px;">Estado</th>
                      <th style=" font-size: 14px;">Codigo IP</th>
                      <th style=" font-size: 14px;">Gestionar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th style=" font-size: 14px;">Codigo de Usuario</th>
                      <th style=" font-size: 14px;">Centro de Trabajo</th>
                      <th style=" font-size: 14px;">Responsable</th>
                      <th style=" font-size: 14px;">Status</th>
                      <th style=" font-size: 14px;">Empresa</th>
                      <th style=" font-size: 14px;">Estado</th>
                      <th style=" font-size: 14px;">Codigo IP</th>
                      <th style=" font-size: 14px;">Gestionar</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php if (!empty($allRadios)) { ?>                   
                      <?php foreach ($allRadios as $key => $value) { ?>
                      <tr>
                        <td style=" font-size: 13px;"><?php echo $value['codigo_usuario']?></td>
                        <td style=" font-size: 12px;"><?php echo $value['centro_trabajo']?></td>
                        <td style=" font-size: 12px;"><?php echo $value['responsable']?></td>
                        <td style=" font-size: 12px;"><?php echo $value['status']?></td>
                        <td style=" font-size: 12px;"><?php echo $value['empresa']?></td>
                        <td style=" font-size: 12px;"><?php echo $value['estado']?></td>
                        <td style=" font-size: 12px;"><?php echo $value['codigo_ip']?></td>
                        <td style=" font-size: 12px;">
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUserModal" data-id="<?php echo "?do=editRadio&id=".$value['id_radio']; ?>">Modificar</button>
                          <a class="btn btn-warning btn-sm" href="?do=radioDetails&id=<?php echo $value['id_radio']; ?>">Mas Detalles</a>
                        </td>
                    </tr>
                      <?php }
                          }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<!-- contenido del Modal MODIFICAR -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirmación</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <p>¿Estas segur@ que quieres modificar los datos del radio?</p> 
      </div>
      <div class="modal-footer">
          <a class="btn btn-warning" href="">Modificar</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
      </div>
    </div>
  </div>
</div>
<!-- End of contenido del Modal MODIFICAR -->
<?php require_once('core/footer.php'); ?>