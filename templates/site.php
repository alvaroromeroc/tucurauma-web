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

</head>

<body>

    <?php include('layouts/navigation.php');?>

    <section class="header  navigation">
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
                                    <a class="nav-link" href="<?= $baseUrl; ?>">Home </a>
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

    <?php
//print_r($data);
$site = $data['site'];
$tags = $data['tags'];
$products = $data['products'];
$related = $data['related'];
?>

    <header class="sites-header">
        <div class="container text-center">
            <h1 class="nombre"><?=$site['name']?></h1>
        </div>
    </header>



    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3><?=$site['name']?></h3>
                    <?php foreach ($tags as $tag) { ?>
                    <a href="<?=$baseUrl."etiquetas/".$tag['id']."-".$tag['title']."/"?>"
                        class="badge badge-success"><?=$tag['title']?></a>
                    <?php } ?>
                    <p class="lead"><?=$site['description']?></p>
                    <!--img src="<?= $baseUrl; ?>assets/sites/<?=$site['id']?>/<?=$site['header']?>"-->
                    <p class="lead"><?=$site['address']?></p>
                    <p class="text-strong">Horario:</p>
                    <p><?=$site['schedule']?>
                    </p>

                    <!-- redes sociales -->
                    <div class="rrss">
                        <?php if(isset($site['whatsapp'])): ?>
                        <span class="Whatsapp"><a href="tel:<?=$site['whatsapp'] ?>"><i
                                    class='fab fa-whatsapp'></i></a></span>
                        <?php endif ?>
                        <?php if(isset($site['facebook'])): ?>
                        <span class="Facebook"><a href="<?=$site['facebook'] ?>" target="_blank"><i
                                    class='fab fa-facebook'></i></a></span>
                        <?php endif ?>
                        <?php if($site['instagram']!=""): ?>
                        <span class="Instagram"><a href="<?=$site['instagram'] ?>" target="_blank"><i
                                    class='fab fa-instagram'></i></a></span>
                        <?php endif ?>
                    </div>
                    <!-- fin redes sociales -->
                </div>

                <div class="col-lg-6">
                    <img class="imagen-site"
                        src="<?=$baseUrl?>assets/images/tiendas/<?=$site['id']?>/<?=$site['header']?>"
                        style="width:100%;">
                    <!--img class="logo-site" src="<?=$baseUrl."assets/sites/".$site['id']."/logo.jpg"; ?>" alt="<?=$site['alias']?>"-->
                </div>

                <div class="col-lg-12 mt-5 mb-5">
                    <div id="map" style="height: 350px; width: 100%"></div>
                </div>
            </div>
        </div>
    </section>

    <?php if(count($products)>0): ?>
    <?php //print_r($products) ?>
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Productos</h3>
                </div>
                <?php foreach ($products as $product) { ?>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?=$baseUrl?>site/<?=$product['id_shops']?>-<?=$product['alias']?>">
                        </a>
                        <div class="card-body">
                            <img class="logo-card"
                                src="<?=$baseUrl?>assets/images/productos/<?=$product['id']?>/<?=$product['image']?>"
                                alt="Card image cap">
                            <p class="card-text"><strong><?=$product['product']?></strong><br />
                                <?=$product['description']?><br />
                                $ <?=$product['price']?></p>
                            <!--a  href="<?= $baseUrl."site/".$product['id_sites']."-".$product['alias']; ?>" class="btn btn-success" role="button">Visitar</a-->
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php endif ?>

    <?php if($site['featured']!=1) : ?>
    <section id="related">
        <?php //print_r($related) ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Tiendas Destacadas</h3>
                </div>
                <?php foreach ($related as $rel_site) { ?>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?=$baseUrl?>site/<?=$rel_site['id']?>-<?=$rel_site['alias']?>">
                            <img class="card-img-top"
                                src="<?=$baseUrl?>assets/images/tiendas/<?=$rel_site['id']?>/<?=$rel_site['thumb_header']?>"
                                alt="<?=$rel_site['name']?>">
                        </a>
                        <div class="card-body">
                            <img class="logo-card"
                                src="<?=$baseUrl?>assets/images/tiendas/<?=$rel_site['id']?>/<?=$rel_site['thumb_logo']?>"
                                alt="<?=$rel_site['name']?>">
                            <p class="card-text"><?=$rel_site['name']?></p>
                            <p><a href="<?= $baseUrl."site/".$rel_site['id']."-".$rel_site['alias']; ?>"
                                    class="btn btn-success" role="button">Visitar</a></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php endif; ?>


    <?php include('layouts/footer.php');?>

    <script>
    var map;

    function initMap() {
        var myLatLng = {
            lat: <?=$site['lat']?>,
            lng: <?=$site['lng']?>
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: myLatLng,
            mapTypeId: 'roadmap',
            streetViewControl: false,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                mapTypeIds: ['roadmap', 'hybrid']
            },
            styles: [{
                    featureType: 'poi', //poi
                    stylers: [{
                        visibility: 'off'
                    }]
                },
                {
                    featureType: 'transit',
                    //elementType: 'labels.icon',
                    stylers: [{
                        visibility: 'off'
                    }]
                }
            ]
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: ' <?=$site['name'].'\n'.$site['address'] ?>'
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3SehR2bcruYousvuclSYAVoWhBoGP-Eo&callback=initMap"
        async defer></script>

    <!-- end footer -->
    <!-- Main jQuery -->
    <script src="<?= $baseUrl; ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $baseUrl; ?>assets/js/popper.min.js"></script>
    <script src="<?= $baseUrl; ?>assets/js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <!--script src="<?= $baseUrl; ?>assets/js/slick.min.js"></script-->
    <!-- Smooth Scroll js -->
    <script src="<?= $baseUrl; ?>assets/js/smooth-scroll.min.js"></script>
    <!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script-->

    <!-- Custom js -->
    <script src="<?= $baseUrl; ?>assets/js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"
        integrity="sha384-MpKPJqgKw6H2j/qCkQtzi0Vd0Z+3y6KzXp14HmTpXRQH//zby2a3MEuCpj7KJf2n" crossorigin="anonymous">
    </script>
</body>

</html>