<?php

include("koneksi.php");


$query="SELECT * from costumer";
$statemen=oci_parse($koneksi,$query);
oci_execute($statemen);
?>
 <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBMnj6Gqf0MIGbsrjEoyqOoRMVs4af-FfM&sensor=false"></script>
    <script type="text/javascript">
    function initialize() {
        var locations = [
<?php
while($baris=oci_fetch_assoc($statemen))
{
?>
          ['<h5><?php echo $baris['COSTUMER_NAMA'];?></h5>',<?php echo $baris['COSTUMER_MAP'];?>], 
          
<?php
}
oci_free_statement($statemen);
oci_close($koneksi);
?>
        ];
        var infowindow = new google.maps.InfoWindow();
    
        var options = {
          zoom: 16, 
          center: new google.maps.LatLng(-6.8730588,107.5760094,20),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    
       // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map_canvas'), options);
    
    var marker, i;
    // proses penambahan marker pada masing-masing lokasi yang berbeda
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
         
      });
   
      // Menampilkan informasi pada masing-masing marker yang diklik    
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  
  };
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<div id="map_canvas" style="width:900px; height: 300px;"></div> 