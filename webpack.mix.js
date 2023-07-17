const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 
//https://laravel.com/docs/8.x/mix

/**
 * app.js is website's javascript. it will handle the dropdown menu.
 * and it support jQuery.
 */
mix.js('resources/js/app.js', 'public/js');
    //.postCss('resources/css/app.css', 'public/css', [
        ////
    //]);
    
// app.scss is website's stylesheet file. it is support the css
mix.sass('resources/sass/app.scss', 'public/css');
//  .sass('resources/sass/logo-styles.scss', 'public/css');
