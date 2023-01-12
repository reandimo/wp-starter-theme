const mix = require('laravel-mix');

mix.setPublicPath('./public');

mix.options({
    fileLoaderDirs:  {
        fonts: './fonts',
        images: './images',
    }
});

mix.webpackConfig({
    externals: {
        "jquery": "jQuery",
    },
    stats: {
        children: true,
    },
});

// ADMIN
mix.js('resources/scripts/admin.js', 'js');
mix.sass('resources/styles/admin.scss', 'css');

// FRONTEND
mix.js('resources/scripts/frontend.js', 'js');
mix.sass('resources/styles/frontend.scss', 'css');