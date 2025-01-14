<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1 ,maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>google location</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQR6Szd2sBV2-1MQXmdAKRHWHa3tNnuH8" type="text/javascript"></script>
  </head>
  <body>
    <div id="clientLocation">
      <form>
        <div>
          <input type="text" name="inputlocation" id="inputlocation">
          <input type="text" id="cityLng" name="cityLng">
          <input type="text" id="cityLat" name="cityLat">
          <input type="text" id="city2" name="city2">
        </div>
      </form>
    </div>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAlKttaE2WuI1xKpvt-f7dBOzcBEHRaUBA&libraries=places"></script>
    <script type="text/javascript">
      google.maps.event.addDomListener(window, 'load', initialize);
      function initialize() {
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('inputlocation'));
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
          var place = autocomplete.getPlace();
          document.getElementById('city2').value = place.name;
          document.getElementById('cityLat').value = place.geometry.location.lat();
          document.getElementById('cityLng').value = place.geometry.location.lng();
        });
      }
    </script>
  </body>
</html>