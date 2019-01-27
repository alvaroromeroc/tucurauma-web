<!DOCTYPE html>
<html lang="es">
  <head>
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
                              <li class="nav-item">
                                  <a class="nav-link" href="<?= $baseUrl; ?>curauma">Curauma</a>
                              </li>
                          </ul>
                      </div>
                  </nav>
              </div>
          </div>
      </div>
  </section>
  <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mt-5 mb-5">
            <h1 class="text-center" style="font-size: 100px; color: #2d922e">404</h1>
            <h3 class="text-center" style="color: #3a2315">Sitio No Encontrado</h3>
            <p class="text-center mt-5"><a href="<?= $baseUrl ?>" class="btn btn-success">Volver al Home</a></p>
          </div>
        

        </div>
      </div>

  </section>

<?php include('layouts/footer.php');?>

  </body>
</html>