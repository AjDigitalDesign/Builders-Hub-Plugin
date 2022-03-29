let mix = require('laravel-mix');




mix.setPublicPath('assets/dist');
mix.js('assets/js/app.js', 'js').vue()
    .sass('assets/scss/app.scss', 'css')
