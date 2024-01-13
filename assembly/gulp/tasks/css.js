const cfg = require('../config');
const {task, src, dest} = require('gulp');
const concat = require('gulp-concat');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');
const ignore = require('gulp-ignore'); // Подключаем плагин gulp-ignore

const compileCSS = () => {
    return src([
        'src/styles/build-tw.css',
        `../../../themes/${cfg.themeName}/assets/src/**/*.css`,
        `../../../themes/${cfg.themeName}/blocks/**/*.css`,
        `../../../themes/${cfg.themeName}/components/**/*.css`
    ])
        .pipe(postcss([tailwindcss, autoprefixer, cssnano({
            preset: 'default',
        }),]))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(concat('bw-style.css'))
        .pipe(dest(cfg.path.build.css));
}
//
// const compileBlocks = () => {
//     return src(`../../../themes/${cfg.themeName}/**/*.css`)
//         .pipe(postcss([
//             tailwindcss,
//         ]))
//         .pipe(cleanCSS({compatibility: 'ie8'}))
//         .pipe(concat('custom-blocks.css'))
//         .pipe(dest('src/styles/'));
// }

// const compileCustom = () => {
//     return src( `../../../themes/${cfg.themeName}/assets/src/**/*.css`)
//         .pipe(postcss([
//             tailwindcss,
//         ]))
//         .pipe(cleanCSS({compatibility: 'ie8'}))
//         .pipe(concat('custom.css'))
//         .pipe(dest('src/styles/'));
// }

module.exports = () => {
    task('css', () => compileCSS());
    // task('css-custom-block', () => compileBlocks());
}

