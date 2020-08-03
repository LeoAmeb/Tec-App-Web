@extends('layouts.app', ['activePage' => 'microsites', 'titlePage' => __('Micrositios')])
@section('content')

<div id="app" class="content">
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <microsites-component></microsites-component>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush