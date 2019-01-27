<!DOCTYPE html>
<html lang="es">
  <head>
    <title>tu curauma</title>
<?php include('layouts/head.php');?>
    <style>
      #map { height: 500px; }
    </style>
  </head>
  <body style="margin:0px; padding:0px;" onload="initMap()">

<?php include('layouts/navigation.php');?>

    <header class="sites-header">
      <div class="container text-center">
        <h1 class="nombre">Curauma</h1>
      </div>
    </header>

    <section id="filtros">
      <main role="main">
      <form action="buscar" method="post">
        <div class="container ">
          <div class="row">
            <div class="col-lg-6 col-sm-6">
              <input class="form-control form-control-sm" type="text" id="inputTexto" name="inputTexto" value="" size="20" maxlength="50" placeholder="Ingrese un nombre" />
            </div>
            <div class="col-lg-4 col-sm-4">
              <select class="form-control form-control-sm" id="inputCategoria" name="inputCategoria">
                <option value="1">Restaurantes</option>
                <option value="2">Mascotas</option>
                <option value="3">Ferreterías</option>
                <option value="4">Bencineras</option>
                <option value="5">Farmacias</option>
                <option value="6">Deportes</option>
                <option value="7">Amasanderías</option>
                <option value="8">Bancos</option>
                <option value="9">Taxis</option>
                <option value="10">Propiedades</option>
              </select>
            </div>
            <div class="col-lg-2 col-sm-2">
              <!--input class="form-control form-control-sm" type="button" id="searchButton" value="Buscar" onclick="buscar()"/-->
              <button class="form-control form-control-sm" type="button" onclick="buscar()"/>Buscar</button>
            </div>
          </div>
        </div>
        </form>
      </main>
    </section>

    <section id="sites">
      <?php $sites = $data['sites']; ?>
      <?php //print_r($data) ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>Todo a un Click!</h3>
          </div>
          <?php foreach ($sites as $valor) { ?>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="card mb-4 shadow-sm">
                <a href="<?= $baseUrl."site/".$valor['id_shops']."-".$valor['alias']; ?>">
                  <img class="card-img-top" src="<?=$baseUrl?>assets/images/tiendas/<?=$valor['id_shops']?>/thumbnail-<?=$valor['header']?>" alt="Card image cap">
                </a>
                <div class="card-body">
                  <img class="logo-card" src="<?=$baseUrl?>assets/images/tiendas/<?=$valor['id_shops']?>/thumbnail-<?=$valor['logo']?>" alt="Card image cap">
                  <p class="card-text"><strong><?=$valor['name']?></strong><br/>
                  <?=$valor['category']?></p>
                  <a  href="<?= $baseUrl."site/".$valor['id_shops']."-".$valor['alias']; ?>" class="btn btn-success" role="button">Visitar</a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

<?php include('layouts/footer.php');?>


  <script>
    function buscar(){
      var id    = $("#inputCategoria").val();
      var text  = $("#inputTexto").val();
      window.location.href = '<?=$baseUrl?>buscar/'+ id +'/' + text;
    }

  </script>
  </body>
</html>


