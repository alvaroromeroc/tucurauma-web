<!doctype html>
<html lang="es">

<head>
	<title>Tu Curauma - Etiquetas</title>
    <?php include('layouts/head.php');?>
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

    <section id="filtros">
        <main role="main">
            <form name="buscarForm" onsubmit="buscar(); return false;">
            <div class="container ">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <input class="form-control" type="text" id="inputTexto" name="inputTexto"
                                value="" size="20" maxlength="50" placeholder="Ingrese un nombre" />
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <select class="selectpicker form-control" id="inputCategoria" name="inputCategoria" multiple data-actions-box="true" data-size="6"> 
                                <?php foreach ($categories as $key) { ?>
                                <option value="<?=$key['id']?>" selected><?=$key['category']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <button class="form-control" type="button" onclick="buscar()" />Buscar</button>
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
                <h3><?=$tag['title']?> <strong>Tu Curauma</strong></h3>
                </div>
                <?php if(count($sites)>0) : ?>
                <?php foreach ($sites as $site) { ?>
                <div class="col-lg-3 col-sm-4 col-6">
                    <a href="<?= $baseUrl."site/".$site['id_shops']."-".$site['alias']; ?>"  title="<?=$site['name']?>">
                        <div class="card mb-4 shadow-sm">
                                <img class="card-img-top"
                                    src="<?=$baseUrl?>assets/images/tiendas/<?=$site['id_shops']?>/<?=$site['thumb_header']?>"
                                    alt="<?=$site['name']?>">
                            
                            <div class="card-body">
                                <p class="category"><?=$site['category']?></p>
                                <!--img class="logo-card"
                                    src="<?=$baseUrl?>assets/images/tiendas/<?=$site['id_shops']?>/<?=$site['thumb_logo']?>"
                                    alt="Logo<?=$site['name']?>" width="100px" height="100px"-->
                                <p class="card-text"><?=$site['name']?><br />
                                <small><i class="fas fa-map-marker-alt"></i> <?=$site['address']?></small></p>
                            </div>
                        </div>
                    </a>
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
    function buscar() {
        var id = $("#inputCategoria").val();
        var text = $("#inputTexto").val();
        window.location.href = '<?=$baseUrl?>buscar/' + id + '/' + text;
    }
    </script>
</body>

</html>