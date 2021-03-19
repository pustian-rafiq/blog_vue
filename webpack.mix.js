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
    .vue()
    .sass('resources/sass/app.scss', 'public/css');


    //mix.sass('resources/sass/site/app.scss', 'public/css/style.css');

    // mix.styles([
    //     'resources/sass/site/assets/css/bootstrap.css',
    //     'resources/sass/site/assets/css/bootstrap-responsive.css',
    //     'resources/sass/site/assets/css/fancybox/jquery.fancybox.css',
    //     'resources/sass/site/assets/css/jcarousel.css',
    //     'resources/sass/site/assets/css/flexslider.css',
    //     'resources/sass/site/assets/css/style.css',
    //     'resources/sass/site/assets/skins/default.css'

    // ],'public/css/all.css');

    // mix.scripts([
    //     'resources/sass/site/assets/js/jquery.js',
    //     'resources/sass/site/assets/js/jquery.easing.1.3.js',
    //     'resources/sass/site/assets/js/bootstrap.js',
    //     'resources/sass/site/assets/js/jcarousel/jquery.jcarousel.min.js',
    //     'resources/sass/site/assets/js/jquery.fancybox.pack.js',
    //     'resources/sass/site/assets/js/jquery.fancybox-media.js',
    //     'resources/sass/site/assets/js/google-code-prettify/prettify.js',
    //     'resources/sass/site/assets/js/portfolio/jquery.quicksand.js',
    //     'resources/sass/site/assets/js/jquery.flexslider.js',
    //     'resources/sass/site/assets/js/tweet/jquery.tweet.js',
    //     'resources/sass/site/assets/js/jquery.nivo.slider.js',
    //     'resources/sass/site/assets/js/jquery.ba-cond.min.js',
    //     'resources/sass/site/assets/js/jquery.ba-cond.min.js',
    //     'resources/sass/site/assets/js/jquery.slitslider.js',
    //     'resources/sass/site/assets/js/animate.js',
    //     'resources/sass/site/assets/js/custom.js',

    // ],'public/css/all.js');

    mix.js('resources/js/app2.js', 'public/js/app2.js')

