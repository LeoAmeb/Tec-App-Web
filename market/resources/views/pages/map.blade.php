@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])

@section('content')
<div id="map"></div>
@endsection

@push('js')
<script>
// <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNKp5_Rau5lSB25KOMy84-e2mMs5EX9aU"><script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initGoogleMaps();
  });
</script>
@endpush