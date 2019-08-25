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

    <!--section id="sites">
        <?php $sites = $data['sites']; ?>
        <?php //print_r($data) ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Todo a un Click!</h3>
                </div>
                <?php foreach ($sites as $valor) { ?>
                <div class="col-lg-4 col-sm-6 col-6">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?= $baseUrl."site/".$valor['id_shops']."-".$valor['alias']; ?>">
                            <img class="card-img-top"
                                src="<?=$baseUrl?>assets/images/tiendas/<?=$valor['id_shops']?>/<?=$valor['thumb_header']?>"
                                alt="<?=$valor['name']?>">
                        </a>
                        <div class="card-body">
                            <img class="logo-card d-none d-sm-block"
                                src="<?=$baseUrl?>assets/images/tiendas/<?=$valor['id_shops']?>/<?=$valor['thumb_logo']?>"
                                alt="<?=$valor['name']?>">
                            <p class="card-text"><strong><?=$valor['name']?></strong><br />
                                <?=$valor['category']?></p>
                            <a href="<?= $baseUrl."site/".$valor['id_shops']."-".$valor['alias']; ?>"
                                class="btn btn-success" role="button">Visitar</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section-->

    <section id="sites">
        <div class="container">
            <div class="row" id="dimanic-shops">
                <div class="col-md-12">
                    <h3><?=$data['category'][0]?> <strong>Tu Curauma</strong></h3>
                </div>
            </div>
        </div>
    </section>

    <section id="button-more ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-3 pt-3 mb-3 mt-3 text-center">
                    <!--button type="button" class="btn btn-success btn-lg" onClick="cargar();">Ver Más Tiendas</button-->
                    <input type="hidden" name="more" id="more" value="1">
                </div>

            </div>
        </div>
    </section>

    <?php
    //$ids = $data['ids']; 
    //print_r($data); ?>

    <?php include('layouts/footer.php');?>


    <script>
    function buscar() {
        var id = $("#inputCategoria").val();
        var text = $("#inputTexto").val();
        window.location.href = '<?=$baseUrl?>buscar/' + id + '/' + text;
    }

    function cargar() {
        num = $('input:hidden[name=more]').val();
        //alert(num);
        $.ajax({
            type: 'GET',
            url: '<?= $baseUrl; ?>locationjson/<?=$ids ?>/' + num + '/',
            success: function(response) { // <= this is the change
                //alert((num-1)*12);
                var data = response; // <= going inside the data itself
                largo = data.length;
                if (num == 1) j = 1;
                for (i = 0; i < largo; i++, j++) {
                    output  = '<div class="col-lg-3 col-sm-4 col-6" id="site-' + j + '">';
                    output += '<a href="<?= $baseUrl; ?>site/' + data[i]['id'] + '-' + data[i]['alias'] + '">';
                    output += '<div class="card mb-4 shadow-sm">';
                    output += '<img class="card-img-top" src="<?=$baseUrl?>assets/images/tiendas/' + data[i]['id'] + '/' + data[i]['header'] + '" alt="'+  data[i]['name'] +'">';
                    output += '<div class="card-body">';
                    output += '<!--img class="logo-card d-none d-sm-block" src="<?=$baseUrl; ?>assets/images/tiendas/' + data[i]['id'] + '/' + data[i]['logo'] + '" alt="' + data[i]['name'] + '"-->';
                    output += '<p class="card-text">' + data[i]['name'] + '</br>';
                    output += '<small><i class="fas fa-map-marker-alt"></i> ' + data[i]['address'] + '</small>' + '</p>';
                    output += '</div>';
                    output += '</div>';
                    output += '</a>';
                    output += '</div>';
                    //(data[i]['name']);
                    $("#dimanic-shops").append(output);
                }
                //(largo == j) ? alert("yes!"): alert("No");
                $("#more").val(Number($("#more").val()) + 1);
            }
        });
    }

    $(function() {
        cargar();

        $(window).scroll(function() {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                cargar();
            }
        });
    });
    </script>
</body>

</html>