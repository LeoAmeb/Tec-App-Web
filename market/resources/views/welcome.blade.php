@extends('layouts.app')
@section('content')
<!-- COMPONENTE DE MAPA -->
<div class="container">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Mapa de Micrositios</h4>
      </div>
      <div class="card-body">
        <div id="map"></div>
      </div>
    </div>
</div>

<!-- 
  SCRIPT PARA MOSTRAR TIENDAS REGISTRADAS 
  Y SUS RESPECTIVOS MARCADORES CON ACCESO A SU MICROSITIO 
-->
<script defer>
  function initMap(){
    var uluru = {lat: 23.7417400, lng: -99.1459900};
    var map = new google.maps.Map(document.getElementById('map'), {zoom: 14, center: uluru});

    fetch("/api/shops")
      .then(function(response){
        return response.json();
      })
      .then(function(data){
        for(var i=0;i<data.length;i++){
          var position = {lat: parseFloat(data[i].latitude), lng: parseFloat(data[i].longitude)};
          var title = data[i].name;
          var sitio = data[i].id;
          var content = "<div style=color:black;><h4>"+ title +"</h4>"+data[i].description+"</div><a href="+sitio+">Sitio</a>";

          var marker = new google.maps.Marker({
            position:position,
            title: title,
            map: map
          });

          var infowindow = new google.maps.InfoWindow();
          infowindow.setContent(content);
          
          google.maps.event.addListener(marker,'click',function(){
              infowindow.setOptions({maxWidth:800});
              infowindow.open(map,marker);
          });
        }
      })
      .catch(function(err){
        console.error(err);
      });
  }

</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false&key=AIzaSyCeaxA8PigzhmvYSteAVU3dZS6S0h87UEI&callback=initMap">
    </script>
@endsection
