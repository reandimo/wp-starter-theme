const mix = require('laravel-mix');

mix.setPublicPath('./public');

mix.webpackConfig({
    externals: {
        "jquery": "jQuery",
    }
});

// ADMIN
mix.js('resources/scripts/admin.js', 'js');
mix.sass('resources/styles/admin.scss', 'css');

// FRONTEND
mix.js('resources/scripts/frontend.js', 'js');
mix.sass('resources/styles/frontend.scss', 'css');