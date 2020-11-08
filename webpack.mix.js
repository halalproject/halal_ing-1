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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.style([
    'public/assets/vendor/bootstrap/css/bootstrap.css',
    'public/assets/vendor/font-awesome/css/font-awesome.css',
    'public/assets/vendor/magnific-popup/magnific-popup.css',
    'public/assets/vendor/bootstrap-datepicker/css/datepicker3.css',
    'public/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css',
    'public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css',
    'public/assets/stylesheets/theme.css',
    'public/assets/stylesheets/skins/default.css',
    'public/assets/stylesheets/theme-custom.css',
    'public/assets/stylesheets/theme-custom.css',
    'public/salert/sweetalert2.css',
    'public/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
    'public/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
    'public/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
    'public/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
    'public/css/styles.css',
]);

mix.script([
    'public/assets/vendor/jquery/jquery.js',
    'public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js',
    'public/assets/vendor/bootstrap/js/bootstrap.js',
    'public/assets/vendor/modernizr/modernizr.js',
    'public/salert/sweetalert2.min.js',
    'public/salert/sweetalert2.common.js',
    'public/assets/vendor/nanoscroller/nanoscroller.js',
    'public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js',
    'public/assets/vendor/magnific-popup/magnific-popup.js',
    'public/assets/vendor/jquery-placeholder/jquery.placeholder.js',
    'public/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js',
    'public/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js',
    'public/assets/vendor/jquery-appear/jquery.appear.js',
    'public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js',
    'public/assets/vendor/jquery-easypiechart/jquery.easypiechart.js',
    'public/assets/vendor/flot/jquery.flot.js',
    'public/assets/vendor/flot-tooltip/jquery.flot.tooltip.js',
    'public/assets/vendor/flot/jquery.flot.pie.js',
    'public/assets/vendor/flot/jquery.flot.categories.js',
    'public/assets/vendor/flot/jquery.flot.resize.js',
    'public/assets/vendor/jquery-sparkline/jquery.sparkline.js',
    'public/assets/vendor/raphael/raphael.js',
    'public/assets/vendor/morris/morris.js',
    'public/assets/vendor/gauge/gauge.js',
    'public/assets/javascripts/theme.js',
    'public/assets/javascripts/theme.custom.js',
    'public/assets/javascripts/theme.init.js',
    'public/vendors/datatables.net/js/jquery.dataTables.min.js',
    'public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
    'public/vendors/datatables.net-buttons/js/buttons.print.min.js',
    'public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
    'public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
    'public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
    'public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
    'public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
    'public/vendors/pdfmake/build/pdfmake.min.js',
    'public/vendors/pdfmake/build/vfs_fonts.js',
]);

mix.image([
    'public/person.png',
    'public/images/footer/malaysia.png',
    'public/images/footer/jakim.png',
    'public/images/footer/kpdnkk.jpg',
    'public/images/footer/ssm.png',
    'public/images/footer/veterinaryMalaysia.png',
    'public/images/footer/kkm.png',
    'public/images/footer/facebook.png',
    'public/images/footer/twitter.png',
])