const mix = require('laravel-mix');

/*
 * Archivo para la compilación de scripts JS y 
 * estilos CSS
 * Comandos a usar: 
 * - npm install
 * - npm run dev
*/

mix.styles([
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/simple-line-icons.min.css',
    'resources/assets/css/style.css'
],'public/css/all.css')

.scripts([
    'resources/assets/js/jquery.min.js',
    'resources/assets/js/popper.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/pace.min.js',    
    'resources/assets/js/Chart.min.js',
    'resources/assets/js/template.js'
],'public/js/all.js')

.js(['resources/js/app.js'],'public/js/app.js');
