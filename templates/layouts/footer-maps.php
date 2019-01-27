<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Tu Curauma <?=date("Y");?></p>
      </div>
      <!-- /.container -->
    </footer>

<script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;

      function initMap() {
        var santiago = {lat: -33.448919, lng: -70.659588};
        map = new google.maps.Map(document.getElementById('map'), {
          center: santiago,
          zoom: 11,
          mapTypeId: 'roadmap',
          mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
        });
        infoWindow = new google.maps.InfoWindow();

        searchButton = document.getElementById("searchButton").onclick = searchLocationsNear;
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

         var categoria = $("#inputCategoria").val();

         var searchUrl = 'locationxml/' + categoria + "/" ;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var name = markerNodes[i].getAttribute("nombre");
             var direccion = markerNodes[i].getAttribute("direccion");
             var thumb = markerNodes[i].getAttribute("thumb");
             var icono = markerNodes[i].getAttribute("icono");
             var horario = markerNodes[i].getAttribute("horario");
             var link = markerNodes[i].getAttribute("id") + "-" + markerNodes[i].getAttribute("alias");
             //var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));

             //createOption(name, distance, i);
             createMarker(latlng, name, direccion, thumb, icono, horario, link);
             bounds.extend(latlng);
           }
           if (bounds!="((1, 180), (-1, -180))") 
            map.fitBounds(bounds);
         });
       }

       function createMarker(latlng, name, direccion, thumb, icono, horario, link) {
          var image = 'assets/img/'+ icono;
          var html = "<div style=\"float:left; padding-right:5px;\"><img src=\"assets/sites/1/" + thumb + "\"></div><div style=\"float:right\"><b>" + name + "</b><br/><sub>" + direccion + "</sub><hr/>" + horario + "<br/><br /><a href=\"site/" +link + "\" target=\"_blank\">Más información</a></div>"; 
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
    <!-- Bootstrap core JavaScript -->
    <script src="<?= $baseUrl; ?>assets/js/jquery/jquery.min.js"></script>
    <script src="<?= $baseUrl; ?>assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
 
    <!-- Plugin JavaScript -->
    <script src="<?= $baseUrl; ?>assets/js/jquery-easing/jquery.easing.min.js"></script>
 
    <!-- Custom JavaScript for this theme -->
    <script src="<?= $baseUrl; ?>assets/js/scrolling-nav.js"></script>

