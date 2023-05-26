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

mix.setPublicPath('/')

if (mix.inProduction()) {
  mix.sass('resources/scss/main.scss', 'css/main.css').options({processCssUrls: false})
  mix.js('resources/js/main.js', 'js/bundle.js')
  mix.version()
} else {
  mix.sass('resources/scss/main.scss', 'css/main.css').options({processCssUrls: false})
  mix.js('resources/js/main.js', 'js/bundle.js')
  mix.version()
  mix.webpackConfig({devtool: 'source-map'})
  mix.sourceMaps()
  mix.version()
}

mix.webpackConfig({
  // resolve: {
  //   extensions: ['.js', '.json', '.vue'],
  // },
  // plugins: [
  // ],
  // module: {
  //   rules: [
  //     {
  //       test: /\.js?$/,
  //       exclude: /(bower_components)/,
  //       use: [{
  //         loader: 'babel-loader',
  //         options: mix.config.babel()
  //       }]
  //     }
  //     ,
      
  //   ]
  // },
  watchOptions: {
      ignored: /node_modules/
  }
})


mix.disableNotifications();

