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

const mix = require("laravel-mix");
const { VueLoaderPlugin } = require("vue-loader");

mix.js("resources/js/app.js", "public/js")
    .vue() // Enables Vue file processing
    .sass("resources/sass/app.scss", "public/css");

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: "vue-loader",
            },
        ],
    },
    plugins: [
        new VueLoaderPlugin(), // Add the VueLoaderPlugin here
    ],
});
