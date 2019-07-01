<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es">
<!--<![endif]-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Tu Curauma - ">

    <meta name="author" content="Themefisher.com">

    <title>Tu Curauma</title>

    <!-- Mobile Specific Meta
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= $baseUrl; ?>assets/img/favicon.png" />

    <!-- CSS
  ================================================== -->
    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/themefisher.style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/bootstrap-select.min.css">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
    <!-- Slick Carousel -->
    <!--link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/slick.css">
  <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/slick-theme.css"-->
    <!-- Main Stylesheet -->
    <!--link rel="stylesheet" href="css/style.css"-->
    <link href="<?= $baseUrl; ?>assets/css/style.css" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css'
        integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

    <style>
    <?php foreach ($categories as $key) {
        ?>.<?=$key['icon']?>-icon {
            background: url('assets/img/icon/icon-<?=$key['icon']?>.png');
            filter: grayscale(100%);
        }

        <?php
    }

    ?>
    </style>



</head>

<!--body id="body"-->

<body style="margin:0px; padding:0px;" onload="initMap()">

    <!--
  Start Preloader
  ==================================== -->
    <!--div id="preloader">
    <div class="preloader">
      <div class="sk-circle1 sk-child"></div>
      <div class="sk-circle2 sk-child"></div>
      <div class="sk-circle3 sk-child"></div>
      <div class="sk-circle4 sk-child"></div>
      <div class="sk-circle5 sk-child"></div>
      <div class="sk-circle6 sk-child"></div>
      <div class="sk-circle7 sk-child"></div>
      <div class="sk-circle8 sk-child"></div>
      <div class="sk-circle9 sk-child"></div>
      <div class="sk-circle10 sk-child"></div>
      <div class="sk-circle11 sk-child"></div>
      <div class="sk-circle12 sk-child"></div>
    </div>
  </div-->
    <!--
  End Preloader
  ==================================== -->



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
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?= $baseUrl; ?>">Home <span
                                            class="sr-only">(current)</span></a>
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

    <!--
Welcome Slider
==================================== -->

    <section id="mapa">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-sm-3 col-sx-12 pr-2 pl-2 pt-1 pb-1 filtros-left">
                    <h3 class="d-none d-sm-block">Buscar Servicios</h3>

                    <div class="pb-2">
                        <?php $categories = $data['categories'] ?>
                        <?php foreach ($categories as $key) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inputCategoria<?=$key['id']?>"
                                name="inputCategoria" value="<?=$key['id']?>">
                            <label class="form-check-label <?=$key['icon']?>-icon"
                                for="inputCategoria<?=$key['id']?>"><?=$key['category']?></label>
                        </div>
                        <?php } ?>
                    </div>

                    <div class="pb-2">
                        <?php $tags = $data['tags'] ?>
                        <select class="selectpicker form-control" id="inputEtiqueta" name="inputEtiqueta"
                            title="Etiquetas" data-hide-disabled="true" multiple data-actions-box="true"
                            data-done-button="true">
                            <?php foreach ($tags as $key) { ?>
                            <option data-content="<span class='badge badge-success'><?=$key['title']?></span>"
                                value="<?=$key['id']?>"><?=$key['title']?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!--div class="pb-1">
                        <input type="text" class="form-control " id="inputNombre" name="inputNombre">
                    </div-->

                    <input type="button" class="btn btn-success btn-block" id="searchMapButton" value="Buscar"
                        onclick="searchLocationsNear()">
                </div>
                <!-- MAP -->
                <div class="col-lg-10 col-sm-9 col-sx-12">
                    <div id="map" style="width: 100%; height: 700px"></div>
                </div>
            </div>
            <!--h1><?php echo $main_heading?></h1>
    <p class="lead"><?php echo $sub_heading?></p-->
        </div>
    </section>

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
                            <!--input class="form-control form-control-sm" type="button" id="searchButtonMap" value="Buscar" onclick="buscar()"/-->
                            <button class="form-control form-control-sm" type="button"
                                onclick="buscar()" />Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>

    <section id="servicios" class="section-xs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Servicios <strong>Tu Curauma</strong></h3>
                </div>
            </div>
            <div Class="row section-xs">

                <!--img src="assets/img/servicios.jpg"-->
                <?php foreach ($categories as $key) { ?>
                <div class="col-lg-3 col-sm-4 col-6">
                    <div class="text-center">
                        <a href="<?=$baseUrl."sites/".$key['id']."-".$key['category']."/"?>">
                            <img class="" src="assets/img/logo_<?=$key['icon']?>.png" alt="<?=$key['category']?>">
                        </a>
                        <div class="">
                            <p class="font-weight-bold">
                                <a
                                    href="<?=$baseUrl."sites/".$key['id']."-".$key['category']."/"?>"><?=$key['category']?></a>
                            </p>
                            <!--p class=""><?=$key['descripcion']?></p-->
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </section>


    <!--  /////////////////////////////   -->




    <!--
Start About Section
==================================== -->
    <section class="service-2 section-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-0">
                    <div class="service-item text-center">
                        <span class="count">1.</span>
                        <h4>Publicidad 1</h4>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="service-item text-center">
                        <span class="count">2.</span>
                        <h4>Publicidad 2</h4>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="service-item text-center">
                        <span class="count">3.</span>
                        <h4>Publicidad 3</h4>
                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <!--
Start Call To Action
==================================== -->
    <!--section class="call-to-action section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2>Open account for free and start trading Bitcoins now!</h2>
				<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin bibendum auctor, <br> nisi elit consequat ipsum, nesagittis sem nid elit. Duis sed odio sitain elit.</p>
				<a href="" class="btn btn-main">Get Started</a>
			</div>
		</div> 		
	</div>   	
</section-->
    <!-- End section -->



    <!--
Start Call To Action
==================================== -->
    <section id="contacto" class="section-sm  bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <h2>Contáctenos</h2>
                    <p>Escríbanos para incorporar su aviso clasificado o la información de su negocio.</p>
                    <form name="mensaje" id="mensaje" method="post" action="<?= $baseUrl; ?>mensajea/">
                        <div class="form-group">
                            <!--label for="exampleInputEmail1">Nombre</label-->
                            <input type="text" class="form-control" id="inputNombre" name="inputNombre"
                                aria-describedby="emailHelp" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <!--label for="exampleInputEmail1">Email address</label-->
                            <input type="email" class="form-control" id="inputCorreo" name="inputCorreo"
                                aria-describedby="emailHelp" placeholder="e-mail">
                            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                        </div>
                        <div class="form-group">
                            <!--label for="exampleSelect1">Teléfono</label-->
                            <input type="text" class="form-control" id="inputTelefono" name="inputTelefono"
                                placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <!--label for="exampleTextarea">Comentario</label-->
                            <textarea class="form-control" id="inputMensaje" name="inputMensaje" rows="3"
                                placeholder="Comentario"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="botonEnviar" id="botonEnviar" data-placement="top">Enviar</button>
                    </form>

                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <!-- -- -->

    <section id="empresas" class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-3">
                    <div class="text-center">
                        <i class='fab fa-cc-paypal' class='fab'></i>
                    </div>
                </div>
                <div class="col-md-3 col-3">
                    <div class="text-center">
                        <i class='fab fa-docker' class='fab'></i>
                    </div>
                </div>
                <div class="col-md-3 col-3">
                    <div class="text-center">
                        <i class='fab fa-aviato' class='fab'></i>
                    </div>
                </div>
                <div class="col-md-3 col-3">
                    <div class="text-center">
                        <i class='fab fa-cpanel' class='fab'></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -- -->

    <footer id="footer" class="bg-one">
        <!--div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <h3>INFORMATION</h3>
                        <ul>
                            <li><a href="#">Payment Option</a></li>
                            <li><a href="#">Free Schedule</a></li>
                            <li><a href="#">Getting Started</a></li>
                            <li><a href="#">Bitcoin Calculator</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <h3>Our Services</h3>
                        <ul>
                            <li><a href="#">Graphic Design</a></li>
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">Web Development</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">FAQ’s</a></li>
                            <li><a href="#">Badges</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="">Facebook</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="">Linkedin</a></li>
                            <li><a href="">Google PLus</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div-->
        <div class="footer-bottom">
            <h5>Tu Curauma <?=date('Y')?>. All rights reserved.</h5>
            <h6>Design and Developed by <a href="https://www.kanoa.cl">Kanoa Studio</a></h6>
        </div>
    </footer>
    <!-- end footer -->


    <div class="modal" id="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--div class="modal-header">
                    <h5 class="modal-title">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div-->
                <div class="modal-body">
                    <p id="msg" class="text-center">Mensaje</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    var map;
    var markers = [];
    var infoWindow;

    function initMap() {
        var curauma = {
            lat: -33.124677,
            lng: -71.566542
        };
        map = new google.maps.Map(document.getElementById('map'), {
            center: curauma,
            zoom: 14,
            mapTypeId: 'hybrid',
            /*mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},*/
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
        infoWindow = new google.maps.InfoWindow();
    }

    function clearLocations() {
        infoWindow.close();
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers.length = 0;
    }

    function searchLocationsNear() {
        clearLocations();

        var listado = [0];
        $("input:checkbox[name=inputCategoria]:checked").each(function() {
            listado.push($(this).val());
        });


        var selO = document.getElementsByName('inputEtiqueta')[0];
        var etiquetas = [0];
        for (i = 0; i < selO.length; i++) {
            if (selO.options[i].selected) {
                etiquetas.push(selO.options[i].value);
            }
        }

        var texto = $("#inputNombre").val();

        var searchUrl = 'locationxml2/' + listado + '/' + etiquetas + '/' + texto;
        downloadUrl(searchUrl, function(data) {
            var xml = parseXml(data);
            var markerNodes = xml.documentElement.getElementsByTagName("marker");
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markerNodes.length; i++) {
                var id = markerNodes[i].getAttribute("id");
                var name = markerNodes[i].getAttribute("nombre");
                var direccion = markerNodes[i].getAttribute("direccion");
                var header = markerNodes[i].getAttribute("header");
                var icono = markerNodes[i].getAttribute("icono");
                var horario = markerNodes[i].getAttribute("horario");
                var link = markerNodes[i].getAttribute("id") + "-" + markerNodes[i].getAttribute("alias");
                //var distance = parseFloat(markerNodes[i].getAttribute("distance"));
                var latlng = new google.maps.LatLng(
                    parseFloat(markerNodes[i].getAttribute("lat")),
                    parseFloat(markerNodes[i].getAttribute("lng")));

                //createOption(name, distance, i);
                createMarker(latlng, id, name, direccion, header, icono + ".png", horario, link);
                bounds.extend(latlng);
            }
            if (bounds != "((1, 180), (-1, -180))")
                map.fitBounds(bounds);
        });
    }

    function createMarker(latlng, id, name, direccion, header, icono, horario, link) {
        var image = {
            url: 'assets/img/icon/' + icono,
            scaledSize: new google.maps.Size(22, 22),
        };

        var html = "<div style=\"float:left; padding-right:5px; \"><img src=\"assets/images/tiendas/" + id + "/" +
            header + "\" width=\"100px\"></div><div style=\"float:right; width: 130px;\"><b>" + name +
            "</b><br/><sub>" + direccion + "</sub><hr/>" + horario + "<br/><br /><a href=\"site/" + link +
            "\" target=\"_blank\">Más información</a></div>";
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            icon: image
        });
        google.maps.event.addListener(marker, 'click' || 'mouseover', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
        });
        markers.push(marker);

    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function parseXml(str) {
        if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
        } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
        }
    }

    function buscar() {
        var id = $("#inputCategoria").val();
        var text = $("#inputTexto").val();
        window.location.href = 'buscar/' + id + '/' + text;
    }

    function doNothing() {}
    </script>

    <!-- API Maps-->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3SehR2bcruYousvuclSYAVoWhBoGP-Eo&callback=initMap">
    </script>


    <!-- Main jQuery -->
    <script src="<?= $baseUrl; ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $baseUrl; ?>assets/js/popper.min.js"></script>
    <script src="<?= $baseUrl; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= $baseUrl; ?>assets/js/bootstrap-select.min.js"></script>
    <!-- Owl Carousel -->
    <!--script src="<?= $baseUrl; ?>assets/js/slick.min.js"></script-->
    <!-- Smooth Scroll js -->
    <script src="<?= $baseUrl; ?>assets/js/smooth-scroll.min.js"></script>

    <!-- Custom js -->
    <script src="<?= $baseUrl; ?>assets/js/script.js"></script>
    <script>
    $(document).ready(function() {
        $("input[name='inputCategoria']").click(function() {

            <?php foreach ($categories as $key) { ?>
            if ($('#inputCategoria<?=$key['id']?>').is(':checked')) $(".<?=$key['icon']?>-icon").css(
                "filter",
                "grayscale(0%)");
            else $(".<?=$key['icon']?>-icon").css("filter", "grayscale(100%)");
            <?php } ?>

            //searchLocationsNear();
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $('#mensaje').submit(function() {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                beforeSend: function() {
                    $("#botonEnviar").prop('disabled', true);
                },
                error: function() {
                    // en caso de error 500
                    $('#msg').html('Sin respuesta del servidor.<br /> Favor intente más tarde');
                    $('#modal').modal('show');
                    $("#botonEnviar").prop('disabled', false);
                },
                success: function(data) {
                    if (data['success'] == true) {
                        $('#msg').html(data['msg']);
                        $('#modal').modal('show');
                        $('#botonEnviar').prop('value', 'Enviado');
                    } else if(data['success'] == false) {
                        $('#msg').html(data['msg']);
                        $('#modal').modal('show');
                        $('#botonEnviar').prop('disabled', false);
                    } else {
                        $('#msg').html('Sin respuesta del servidor.<br /> Favor intente más tarde');
                        $('#modal').modal('show');
                        $('#botonEnviar').prop('disabled', false);
                    }
                }
            })
            return false;
        });


    });
    </script>

</body>

</html>