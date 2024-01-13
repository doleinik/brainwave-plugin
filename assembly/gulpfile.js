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
    watch( `../../../themes/${cfg.themeName}/**/*.php`, parallel('css'));
    watch( `../../../themes/${cfg.themeName}/blocks/**/*.css`, parallel('css'));
    watch( `../../../themes/${cfg.themeName}/components/**/*.css`, parallel('css'));
    watch( `../../../themes/${cfg.themeName}/assets/src/**/*.css`, parallel('css'));
});