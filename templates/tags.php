<!doctype html>
<html lang="es">
<head>
    <?php include('layouts/head.php');?>
    <title>Tu Curauma - Etiquetas</title>
</head>

<body>
	<?php include('layouts/navigation.php');?>

	<section class="header navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-md">
                        <a class="navbar-brand" href="index.html">
                            <img src="<?= $baseUrl; ?>assets/img/tu-curauma-logo.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $baseUrl; ?>">Home</a>
                                </li>
                                <li class="nav-item active">
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
    <header class="sites-header">
        <div class="container text-center">
            <h1 class="nombre">Curauma</h1>
        </div>
    </header>

    <section id="sites">
      <?php $sites = $data['sites']; ?>
      <?php //print_r($data) ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Todo a un Click!</h3>
          </div>
          <?php if(count($sites)>0) : ?>
            <?php foreach ($sites as $site) { ?>
              <div class="col-lg-4 col-sm-6 col-12">
                <div class="card mb-4 shadow-sm">
                  <a href="<?= $baseUrl."site/".$site['id_shops']."-".$site['alias']; ?>">
                    <img class="card-img-top" src="<?=$baseUrl?>assets/images/tiendas/<?=$site['id_shops']?>/<?=$site['thumb_header']?>" alt="<?=$site['name']?>">
                  </a>
                  <div class="card-body">
                    <img class="logo-card" src="<?=$baseUrl?>assets/images/tiendas/<?=$site['id_shops']?>/<?=$site['thumb_logo']?>" alt="Logo<?=$site['name']?>" width="100px" height="100px">
                    <p class="card-text"><strong><?=$site['name']?></strong><br/>
                    </p>
                    <a  href="<?= $baseUrl."site/".$site['id_shops']."-".$site['alias']; ?>" class="btn btn-success" role="button">Visitar</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php else :?>
            <div class="col-lg-4 col-sm-6 col-12">
              Sin resultados
            </div>
          <?php endif; ?>

        </div>
      </div>
    </section>

    <?php include('layouts/footer.php');?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>