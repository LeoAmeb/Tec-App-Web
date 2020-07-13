const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/app.js')
.sass('resources/sass/app.scss', 'public/css/app.scss')
.styles([
    'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons',
    'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
    'public/material/css/material-dashboard.css',
    'public/material/css/material-dashboard-rtl.css'

],'public/material/css/all.css')
.scripts([

    // <!--   Core JS Files   -->
    'public/material/js/core/jquery.min.js',
    'public/material/js/core/popper.min.js',
    'public/material/js/core/bootstrap-material-design.min.js',
    'public/material/js/plugins/perfect-scrollbar.jquery.min.js',
    // <!-- Plugin for the momentJs  -->
    'public/material/js/plugins/moment.min.js',
    // <!--  Plugin for Sweet Alert -->
    'public/material/js/plugins/sweetalert2.js',
    // <!-- Forms Validations Plugin -->
    'public/material/js/plugins/jquery.validate.min.js',
    // <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    'public/material/js/plugins/jquery.bootstrap-wizard.js',
    // <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    'public/material/js/plugins/bootstrap-selectpicker.js',
    // <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    'public/material/js/plugins/bootstrap-datetimepicker.min.js',
    // <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    'public/material/js/plugins/jquery.dataTables.min.js',
    // <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    'public/material/js/plugins/bootstrap-tagsinput.js',
    // <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    'public/material/js/plugins/jasny-bootstrap.min.js',
    // <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    'public/material/js/plugins/fullcalendar.min.js',
    // <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    'public/material/js/plugins/jquery-jvectormap.js',
    // <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    'public/material/js/plugins/nouislider.min.js',
    // <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    'https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js',
    // <!-- Library for adding dinamically elements -->
    'public/material/js/plugins/arrive.min.js',
    // <!-- Chartist JS -->
    'public/material/js/plugins/chartist.min.js',
    // <!--  Notifications Plugin    -->
    'public/material/js/plugins/bootstrap-notify.js',
    // <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    'public/material/js/material-dashboard.js?v=2.1.1" type="text/javascript'


],'public/material/js/all.js');