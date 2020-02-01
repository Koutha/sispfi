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
            <h1 class="h3 mb-0 text-gray-800">Registro de usuarios</h1>
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
              <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                      <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background-color: #ef9f46;">
                      </div>
                      <div class="col-lg-7">
                        <div class="p-5">
                          <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Crear un Usuario</h1>
                            <?php if (isset($_SESSION['regUser'])&&$_SESSION['regUser']==1) {?>
                             <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Registrado!</strong> El usuario ha sido registrado exitosamente.
                            </div>
                            <?php unset($_SESSION['regUser']);} ?>
                          </div>
                          <form action="" method="post" class="user" role="form" id="userForm">
                            <div class="form-group">
                              <?php if (isset($userExists)&&$userExists==1) {?>
                              <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>El nombre se usuario ya existe</strong> por favor intente con uno diferente
                              </div>
                              <?php } ?>
                              <input type="text" name="username" id="username" class="form-control form-control-user" id="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{3,20}$" title="El nombre de usuario debe contener al menos 4 caracteres, no puede empezar con un caracter numerico ni contener espacios" placeholder="Defina un nombre de usuario" autocomplete="off" maxlength="12" required="required" onkeypress="return letterNumberNoSpace(event);" value="<?php echo isset($_POST['username']) ? $_POST['username']:""; ?>">
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="nombres" class="form-control form-control-user" id="nombres"
                                pattern="^(([A-za-z]+[\s]{1}[A-za-z]+)|([A-Za-z]+))$" title="Los nombres deben contener al menos 3 caracteres, no puede contener un caracter numerico ni empezar con espacios" placeholder="Primer y segundo nombre" autocomplete="off" minlength="3" maxlength="32" required="required" onkeypress="return letra(event);" value="<?php echo isset($_POST['nombres']) ? $_POST['nombres']:""; ?>">
                              </div>
                              <div class="col-sm-6">
                                <input type="text" name="apellidos" class="form-control form-control-user" id="apellidos" pattern="^(([A-za-z]+[\s]{1}[A-za-z]+)|([A-Za-z]+))$" title="Los apellidos deben contener al menos 3 caracteres, no puede contener un caracter numerico ni empezar con espacios" placeholder="Apellidos" autocomplete="off" minlength="3" maxlength="32" required="required" onkeypress="return letra(event);" value="<?php echo isset($_POST['apellidos']) ? $_POST['apellidos']:""; ?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <?php if (isset($cedExists)&&$cedExists==1) {?>
                              <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>El numero de cedula ya se encuentra registrado</strong> por favor intente con una diferente
                              </div>
                              <?php } ?>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="cedula" class="form-control form-control-user" id="cedula" minlength="5" maxlength="8" placeholder="Cedula" title="La cedula debe ser escrita sin puntos Ejemplo: 7896541" autocomplete="off" required="required" onkeypress="return numero(event);" value="<?php echo isset($_POST['cedula']) ? $_POST['cedula']:""; ?>">
                              </div>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Correo" autocomplete="off" value="<?php echo isset($_POST['email']) ? $_POST['email']:""; ?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <?php if (isset($pass)&&$pass==0) {?>
                            <div class="alert alert-danger alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              Las contraseñas no coinciden
                            </div>
                              <?php } ?>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user" id="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número, una letra mayúscula, una minuscula y al menos 8 o más caracteres" placeholder="Contraseña" autocomplete="off" required="required">
                              </div>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="rpass" class="form-control form-control-user" id="rpass"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número, una letra mayúscula, una minuscula y al menos 8 o más caracteres" placeholder="Repita la contraseña" autocomplete="off" required="required">
                              </div>
                            </div>
                            <hr>
                            <button type="submit" name="submit" value="regUser" id="btnRegUser" class="btn btn-primary btn-user btn-block">
                              Registrar
                            </button>
                            </form>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
<?php require_once('core/footer.php'); ?>