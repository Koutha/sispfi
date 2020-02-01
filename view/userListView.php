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
            <h1 class="h3 mb-0 text-gray-800">Consulta de usuarios</h1>
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
                      <th>Usuario</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Cedula</th>
                      <th>Correo</th>
                      <th>Gestionar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Usuario</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Cedula</th>
                      <th>Correo</th>
                      <th>Gestionar</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php if (!empty($allUsers)) { ?>                   
                      <?php foreach ($allUsers as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value['username']?></td>
                        <td><?php echo $value['nombres']?></td>
                        <td><?php echo $value['apellidos']?></td>
                        <td><?php echo $value['cedula']?></td>
                        <td><?php echo $value['email']?></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal" data-id="<?php echo "?do=editUser&id=".$value['id_usuario']; ?>">Modificar</button>
                        </td>
                    </tr>
                    <?php  }
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
        <p>¿Estas segur@ que quieres modificar al usuario?</p> 
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