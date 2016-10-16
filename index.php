<html>
<head>
  <?php 
  include 'head.php'; 
  include_once 'proses/dbinfo.php';
  ?>
  <script type="text/javascript">
    function load() {
      var map = new google.maps.Map(document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(-0.494823, 117.143615),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("xml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var point = new google.maps.LatLng(
            parseFloat(markers[i].getAttribute("lat")),
            parseFloat(markers[i].getAttribute("lng")));
          var gb = markers[i].getAttribute("img");
          //var img = markers[i].getElementById('img');

          var html = "Nama Tong Sampah:<b>" + name + "</b> <br/>Lokasi:" + point+"</b> <br/>Foto: <img width=100 height=100 src="+gb+">";
          var icon = 'assets/img/tong.png';
          
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
  </script> 
</head>

<body onload="load()" class="">
  <?php include 'header.php'; ?>


  <div class="container">
    <div class="control-group">
      
      <?php
      $sql = "SELECT * FROM cabang";
      $query = mysqli_query($con,$sql);
      $count = mysqli_num_rows($query);
      ?>
      <div class="w3-container w3-align-left">
        <?php
        echo "Jumlah Tong Sampah: $count <br/>";
        ?> 
      </div>
    </div>


    <div id="map_canvas" style="height:500px"></div>

  </div>
  <div class="w3-padding-8 w3-green w3-margin-top">
    <div class="w3-container w3-align-left">
      <p align="center">&copy; SMD Tong Sampah | <a href="admin/">Admin</a></p> 
    </div>

  </div>

</body>
</html>
