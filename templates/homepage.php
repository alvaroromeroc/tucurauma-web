
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="es"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Tu Curauma - ">
  
  <meta name="author" content="Themefisher.com">

  <title>Tu Curauma</title>

<!-- Mobile Specific Meta
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  
  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/themefisher.style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/bootstrap.min.css">
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
  <!-- Slick Carousel -->
  <!--link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/slick.css">
  <link rel="stylesheet" href="<?= $baseUrl; ?>assets/css/slick-theme.css"-->
  <!-- Main Stylesheet -->
  <!--link rel="stylesheet" href="css/style.css"-->
  <link href="<?= $baseUrl; ?>assets/css/style.css" rel="stylesheet">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

  

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

  <section class="header  navigation">
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
                              <li class="nav-item active">
                                  <a class="nav-link" href="<?= $baseUrl; ?>">Home <span class="sr-only">(current)</span></a>
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
      <div class="col-lg-2 col-sm-2 col-sx-12 filtros-left">
          <h3>Buscar Servicios</h3>
              <!--label for="raddressInput">Lugares:</label-->
              <!--input type="hidden" id="addressInput" value="macul" size="15"-->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria1" name="inputCategoria" value="1">
                <label class="form-check-label restaurantes-icon" for="inputCategoria1">Restaurantes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria2" name="inputCategoria" value="2">
                <label class="form-check-label mascotas-icon" for="inputCategoria2">Mascotas</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria3" name="inputCategoria" value="3">
                <label class="form-check-label ferreterias-icon" for="inputCategoria3">Ferreterías</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria4" name="inputCategoria" value="4">
                <label class="form-check-label bencineras-icon" for="inputCategoria4">Bencineras</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria5" name="inputCategoria" value="5">
                <label class="form-check-label farmacias-icon" for="inputCategoria5">Farmacias</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria6" name="inputCategoria" value="6">
                <label class="form-check-label deportes-icon" for="inputCategoria6">Deportes</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria7" name="inputCategoria" value="7">
                <label class="form-check-label amasanderias-icon" for="inputCategoria7">Amasanderías</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria8" name="inputCategoria" value="8">
                <label class="form-check-label bancos-icon" for="inputCategoria8">Bancos</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria9" name="inputCategoria" value="9">
                <label class="form-check-label taxis-icon" for="inputCategoria9">Taxis</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inputCategoria10" name="inputCategoria" value="10">
                <label class="form-check-label propiedades-icon" for="inputCategoria10">Propiedades</label>
              </div>
              <div>
                <select id="locationSelect" style="width: 90%; visibility: hidden"></select>
              </div>

              <!--input type="button" id="searchButton" value="Buscar"-->
        </div>
        <div class="col-lg-10 col-sm-10 col-sx-12">
          <div id="map" style="width: 100%; height: 700px"></div>
        </div>
      </div>
    <!--h1><?php echo $main_heading?></h1>
    <p class="lead"><?php echo $sub_heading?></p-->
    </div>
</section>

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

    <section id="servicios" class="section-xs">
      <div class="container">
        <div class="row">
            <div class="col">
                <h3>Servicios <strong>Tu Curauma</strong></h3>
            </div>
        </div>
        <div Class="row section-xs">
        
          <!--img src="assets/img/servicios.jpg"-->
          <?php $categories = $data['categories'] ?>
          <?php //print_r($categories) ?>
          <?php foreach ($categories as $key) { ?>
              <div class="col-lg-3 col-sm-4 col-6">
                <div class="text-center">
                  <a href="<?=$baseUrl."sites/".$key['id']."-".$key['category']."/"?>">
                    <img class="" src="assets/img/logo_<?=$key['icon']?>" alt="<?=$key['category']?>">
                  </a>
                  <div class="">
                    <p class="font-weight-bold">
                      <a href="<?=$baseUrl."sites/".$key['id']."-".$key['category']."/"?>"><?=$key['category']?></a>
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
    </div>    <!-- End row -->
  </div>    <!-- End container -->
</section>   <!-- End section -->

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
</section-->   <!-- End section -->

		

<!--
Start Call To Action
==================================== -->
<section id="contacto" class="section-sm  bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-center">
				<h2>Contáctenos</h2>
				<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin bibendum auctor</p>
        <form>
          <div class="form-group">
            <!--label for="exampleInputEmail1">Nombre</label-->
            <input type="text" class="form-control" id="inputNombre" name="inputNombre" aria-describedby="emailHelp" placeholder="Nombre">
          </div>
          <div class="form-group">
            <!--label for="exampleInputEmail1">Email address</label-->
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="e-mail">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>
          <div class="form-group">
            <!--label for="exampleSelect1">Teléfono</label-->
            <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="Teléfono">
          </div>
          <div class="form-group">
            <!--label for="exampleTextarea">Comentario</label-->
            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Comentario"></textarea>
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
        </form>
				
			</div>
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->



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
</footer> <!-- end footer -->


  <script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;

      function initMap() {
        var curauma = {lat: -33.124677, lng: -71.566542};
        map = new google.maps.Map(document.getElementById('map'), {
          center: curauma,
          zoom: 14,
          mapTypeId: 'hybrid',
          /*mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},*/
          styles: [
          {
              featureType: 'poi', //poi
              stylers: [{visibility: 'off'}]
          },
          {
              featureType: 'transit',
              //elementType: 'labels.icon',
              stylers: [{visibility: 'off'}]
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
          $("input:checkbox[name=inputCategoria]:checked").each(function(){
            listado.push($(this).val());
          });

          var searchUrl = 'locationxml/' + listado + "/" ;
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
             createMarker(latlng, id, name, direccion, header, icono, horario, link);
             bounds.extend(latlng);
           }
           if (bounds!="((1, 180), (-1, -180))") 
            map.fitBounds(bounds);
         });
       }

       function createMarker(latlng, id, name, direccion, header, icono, horario, link) {
          var image = 'assets/img/icon/'+ icono;
          var html = "<div style=\"float:left; padding-right:5px; \"><img src=\"assets/images/tiendas/"+id+"/" + "thumbnail-" + header + "\" width=\"100px\"></div><div style=\"float:right; width: 130px;\"><b>" + name + "</b><br/><sub>" + direccion + "</sub><hr/>" + horario + "<br/><br /><a href=\"site/" +link + "\" target=\"_blank\">Más información</a></div>"; 
          var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            icon : image
          });
          google.maps.event.addListener(marker, 'click'||'mouseover', function() {
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

       function doNothing() {}

 
    </script>

    <!-- API Maps-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyGM2gGs7ZVz9G5NrqJ3tPI-GQx8X7OA4&callback=initMap"></script>



    <!-- end Footer Area
    ========================================== -->


    
    <!-- 
    Essential Scripts
    =====================================-->
    
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
<script>
     //$(document).ready(function () {
      $( "input[name='inputCategoria']" ).click(function() {
        if ($('#inputCategoria1').is(':checked')) $( ".restaurantes-icon").css("filter","grayscale(0%)");
        else $( ".restaurantes-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria2').is(':checked')) $( ".mascotas-icon").css("filter","grayscale(0%)");
        else $( ".mascotas-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria3').is(':checked')) $( ".ferreterias-icon").css("filter","grayscale(0%)");
        else $( ".ferreterias-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria4').is(':checked')) $( ".bencineras-icon").css("filter","grayscale(0%)");
        else $( ".bencineras-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria5').is(':checked')) $( ".farmacias-icon").css("filter","grayscale(0%)");
        else $( ".farmacias-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria6').is(':checked')) $( ".deportes-icon").css("filter","grayscale(0%)");
        else $( ".deportes-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria7').is(':checked')) $( ".amasanderias-icon").css("filter","grayscale(0%)");
        else $( ".amasanderias-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria8').is(':checked')) $( ".bancos-icon").css("filter","grayscale(0%)");
        else $( ".bancos-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria9').is(':checked')) $( ".taxis-icon").css("filter","grayscale(0%)");
        else $( ".taxis-icon").css("filter","grayscale(100%)");
        if ($('#inputCategoria10').is(':checked')) $( ".propiedades-icon").css("filter","grayscale(0%)");
        else $( ".propiedades-icon").css("filter","grayscale(100%)");


        searchLocationsNear();
      });
    //});
  </script>

  <script>
    //$("#searchButton").onClick(alert("click"));
    function buscar(){
      var id    = $("#inputCategoria").val();
      var text  = $("#inputTexto").val();
      //alert(id);
      window.location.href = 'buscar/'+ id +'/' + text;
    }

  </script>

  </body>
  </html>
