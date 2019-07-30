<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es">
<!--<![endif]-->
<head>
    <title>Tu Curauma</title>
    <?php include('layouts/head.php');?>

    <style>
    #map {
        height: 500px;
    }
    </style>
</head>

<body style="margin:0px; padding:0px;" onload="initMap()">

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

    <header class="sites-header">
        <div class="container text-center">
            <h1 class="nombre">Curauma</h1>
        </div>
    </header>

    <section id="filtros">
        <main role="main">
            <form name="buscarForm" onsubmit="buscar(); return false;">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <input class="form-control form-control-sm" type="text" id="inputTexto" name="inputTexto"
                                value="" size="20" maxlength="50" placeholder="Ingrese un nombre" />
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <select class="form-control form-control-sm" id="inputCategoria" name="inputCategoria">
                                <?php foreach ($categories as $key) { ?>
                                <option value="<?=$key['id']?>"><?=$key['category']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <!--input class="form-control form-control-sm" type="button" id="searchButton" value="Buscar" onclick="buscar()"/-->
                            <button class="form-control form-control-sm" type="button"
                                onclick="buscar()" />Buscar</button>
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
                <?php if(count($sites)>0) : ?>
                <?php foreach ($sites as $valor) { ?>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?= $baseUrl."site/".$valor['id']."-".$valor['alias']; ?>">
                            <img class="card-img-top"
                                src="<?=$baseUrl?>assets/images/tiendas/<?=$valor['id']?>/<?=$valor['thumb_header']?>"
                                alt="<?=$valor['name']?>">
                        </a>
                        <div class="card-body">
                            <img class="logo-card"
                                src="<?=$baseUrl?>assets/images/tiendas/<?=$valor['id']?>/<?=$valor['thumb_logo']?>"
                                alt="Logo<?=$valor['name']?>" width="100px" height="100px">
                            <p class="card-text"><strong><?=$valor['name']?></strong><br />
                                <?=$valor['category']?></p>
                            <a href="<?= $baseUrl."site/".$valor['id']."-".$valor['alias']; ?>" class="btn btn-success"
                                role="button">Visitar</a>
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

    <script>
    //$("#searchButton").onClick(alert("click"));
    function buscar() {
        var id = $("#inputCategoria").val();
        var text = $("#inputTexto").val();
        //alert(id);
        window.location.href = '<?= $baseUrl ?>buscar/' + id + '/' + text;
    }
    </script>
</body>

</html>