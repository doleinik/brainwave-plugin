const cfg = require('../config');
const { task, src, dest } = require('gulp');
const gp = require('gulp-load-plugins')();
const webpackStream = require('webpack-stream');
const { log } = require('../utils');

const compileJS = (mode) => {
  return src([`../../../themes/${cfg.themeName}/assets/src/scripts/index.js`])
    .pipe(gp.plumber(cfg.onError))
    .pipe(webpackStream({
      mode: mode,
      output: {
        filename: 'bw-script.js',
      },
      // devtool: 'source-map',
      externals: {
      },
      module: {
        rules: [{
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env'],
              plugins: [
                '@babel/transform-runtime'
              ]
            }
          }
        }]
      }
    }))
    .pipe(dest(cfg.path.build.js))
    .on('finish', () => log.success(`JS compiled! (${mode})`))
};

module.exports = () => {
  task('js', () => compileJS('development'));
}