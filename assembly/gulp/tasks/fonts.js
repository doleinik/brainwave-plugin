const cfg = require("../config");
const { log, removeLocal } = require("../utils");
const glob = require("glob");
const gulp = require("gulp");
const gp = require("gulp-load-plugins")();

// Clean fonts folder
const cleanFonts = (cb) => removeLocal(cfg.path.build.fonts, cb);

// Convert ttf to woff2 and move to assets
const ttf2woff2 = (cb) => {
  const src = `${cfg.path.src.fonts}*.ttf`;

  return glob.sync(src).length
    ? gulp
        .src(src)
        .pipe(gp.plumber(cfg.onError))
        .pipe(gp.ttf2woff2())
        .pipe(gulp.dest(cfg.path.build.fonts))
        .on("end", () => log.success("TTF converted to WOFF2"))
    : cb();
};

// Copy woff2 fonts to assets
const copyFonts = (cb) => {
  const src = `${cfg.path.src.fonts}*.{ttf,woff2}`;

  return glob.sync(src).length
    ? gulp
        .src(src)
        .pipe(gp.plumber(cfg.onError))
        .pipe(gulp.dest(cfg.path.build.fonts))
        .on("finish", () => log.success("Fonts copied to assets!"))
    : cb();
};

// Inject fonts preload in header
const preloadFonts = (cb) => {
  const target = gulp.src(`app/${cfg.path.theme}/header.php`, {
    allowEmpty: true,
  });
  const fonts = gulp.src(`${cfg.path.build.fonts}*.woff2`, { read: false });

  return target
    .pipe(gp.plumber(cfg.onError))
    .pipe(
      gp.inject(fonts, {
        empty: true,
        name: "fontsPreload",
        endtag: "<!-- endfontsPreload -->",
        transform: (filepath, file) =>
          `<link rel="preload" as="font" type="font/woff2" href="<?php echo assets('fonts/${file.relative}');?>" crossorigin>`,
      })
    )
    .pipe(gp.removeEmptyLines())
    .pipe(gulp.dest(`app/${cfg.path.theme}/`))
    .on("finish", () => log.success("Fonts preload links updated!"));
};

// Export tasks
module.exports = () => {
  gulp.task("fonts", gulp.series(gulp.parallel(ttf2woff2, copyFonts)));
  gulp.task("build:fonts", gulp.series(ttf2woff2, copyFonts, preloadFonts));
};
