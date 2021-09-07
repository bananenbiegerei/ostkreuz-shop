require('dotenv').config();
const mix = require('laravel-mix');

mix.webpackConfig({ devtool: 'inline-source-map' });

mix.js('src/js/app.js', 'js')
  .sourceMaps()
  .setPublicPath('dist');

mix.sass(
  'src/scss/app.scss',
  'css',
  {
    sassOptions: {
      includePaths: ['node_modules'],
    },
  },
)
  .options({
    processCssUrls: false,
  })
  .sourceMaps()
  .setPublicPath('dist');

mix.copyDirectory('src/img', 'dist/img');

mix.browserSync({
  open: false,
  proxy: process.env.BROWSERSYNC_PROXY_URL,
  watch: true,
  files: ['./src/scss/**/*.scss', './src/js/**/*.js', './**/*.php']
});

