@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Tablero')])
@section('content')
<div class="container" style="height: auto;">

  <div class="card card-nav-tabs">
    <h4 class="card-header card-header-warning">Busca un micrositio</h4>
    <div class="card-body">
      <input type="text" class="form-control" placeholder="Busca un Micrositio">
      <button type="submit" class="btn btn-success">Buscar</button>
    </div>

  <div id="map"></div>
  <div class="row justify-content-center"></div>
</div>
@endsection

@push('js')
<script type="text/javascript">

  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initGoogleMaps();
  });
</script>
@endpush