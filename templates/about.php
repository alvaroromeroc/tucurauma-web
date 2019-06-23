<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Tu Curauma</title>
<?php include('layouts/head.php');?>
  </head>
  <body id="page-top">

<?php include('layouts/navigation.php');?>

  <section class="header navigation">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <nav class="navbar navbar-expand-md">
                      <a class="navbar-brand" href="index.html">
                          <img src="<?= $baseUrl; ?>assets/img/tu-curauma-logo.png" alt="logo">
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="fas fa-bars"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto">
                              <li class="nav-item">
                                  <a class="nav-link" href="<?= $baseUrl; ?>">Home</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?= $baseUrl."sites/"; ?>">Sitios</a>
                              </li>
                              <li class="nav-item active">
                                  <a class="nav-link" href="<?= $baseUrl; ?>curauma">Curauma</a>
                              </li>
                          </ul>
                      </div>
                  </nav>
                  
              </div>
          </div>
      </div>
  </section> 
    <header class="text-white">
      <div class="container text-center">
        <h1><?php echo $main_heading?></h1>
        <!--p class="lead"><?php echo $sub_heading?></p-->
      </div>
    </header> 
 
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Acerca de Curauma</h2>
            <p class="lead">TUCURAUMA.CL es un portal web dedicado a promover y visibilizar todos los negocios de Curauma y Placilla, de manera rápida y actualizada a través de un mapa interactivo que filtrará cada negocio según su especialidad.</p>
          </div>
        </div>
      </div>
    </section>

<?php include('layouts/footer.php');?>

  </body>
</html>