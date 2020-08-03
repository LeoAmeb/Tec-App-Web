@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Productos')])
@section('content')

<div id="app" class="content">
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <products-component></products-component>
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