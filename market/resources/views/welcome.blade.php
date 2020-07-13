@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Tablero')])

@section('content')
<div class="container" style="height: auto;">
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">
          <i class="fa fa-search black" aria-hidden="true"></i>
      </span>
    </div>
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