const mix = require("laravel-mix");
require("laravel-mix-svg-vue");
const path = require("path");

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

mix.setPublicPath("")
    .js("resources/src/app.js", "public/js")
    .js("resources/src/admin.js", "public/js")
    .sass("resources/src/app.scss", "public/css")
    .vue({
        version: 3,
        //extractStyles: false,
    })
    .svgVue()
    .alias({
        vue$: path.join(__dirname, "node_modules/vue/dist/vue.esm-bundler.js"),
        "@": path.join(__dirname, "resources/src"),
    })
    .extract(["vue", "bulma"]);

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: "sass-loader",
                        options: {
                            //this might be "data" or "prependData" depening on your version
                            prependData:
                                '@import "./resources/src/variables.scss";',
                        },
                    },
                ],
            },
        ],
    },
});
