const mix = require('laravel-mix');
const webpack = require('webpack');

/*
 |--------------------------------------------------------------------------
 | Configuration
 |--------------------------------------------------------------------------
 |
 | - dotenv
 | - webpack
 |
 */

// default
const default_url = 'http://localhost/Project-link-innova'
const app_path = () => {
  let path = (process.env.APP_URL || '/')
  return (path.substr(path.length - 1) != '/') ? path + '/' : path
}

// dotenv
require('dotenv').config({
  path: __dirname + '/.env'
})

mix.options({
  terser: {
    extractComments: false,
  }
});

// webpack
const webpackPlugin = new webpack.DefinePlugin({
  'process.env.APP_URL': JSON.stringify(process.env.APP_URL || default_url),
  'process.env.API_URL': JSON.stringify(process.env.API_URL || `${default_url}/api`),
  'process.env.APP_PATH': JSON.stringify(process.env.APP_PATH || '/')
})

mix
  .webpackConfig({
    plugins: [
      webpackPlugin
    ],
    resolve: {
      extensions: ['.js', '.vue'],
      alias: {
        '@': __dirname + '/resources',
      },
    },
    output: {
      chunkFilename: 'js/[name].bundle.js',
      publicPath: app_path,
    },
    stats: {
      children: true,
    },
  })
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

mix.js('resources/js/app.js', 'public/js')
  .vue()
  .sass('resources/sass/app.scss', 'public/css', {
    additionalData: `$app-url: "${process.env.APP_URL || default_url}";`
  })
  // .postCss('resources/css/app.css', 'public/css', [
  //   //
  // ]);
