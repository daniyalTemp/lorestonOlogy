const mix = require('laravel-mix');


mix.webpackConfig({
    output: {
        path: __dirname + "/public"
    }
});

mix
    .js('resources/Vue/user.js', 'js')


