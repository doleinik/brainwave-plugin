const {task, watch, series, parallel} = require('gulp');
const cfg = require('./gulp/config');

// Tasks list
require('./gulp/tasks/db')();
require('./gulp/tasks/js')();
require('./gulp/tasks/fonts')();
require('./gulp/tasks/css')();

// Default watch tasks
task('default', () => {
    watch(`${cfg.path.watch.js}/**/*.js`, parallel('js'));
    watch(`${cfg.path.watch.css}/**/*.css`, parallel('css'));
    watch(`${cfg.path.watch.cssBlocks}/**/*.css`, parallel('css-custom-block', 'css-custom', 'css'));
    watch(`${cfg.path.watch.cssCustom}/**/*.css`, parallel('css-custom','css-custom-block', 'css'));
});