const cfg = require('./../config.json');

const themePath = `../../../themes/${cfg.themeName}`;
const assetsPath = `../../../themes/${cfg.themeName}/assets`;

// Pathes
cfg.path = {
  theme: themePath,
  backup: '.backup',
  src: {
    js: `../../../themes/${cfg.themeName}/assets/src/scripts`,
    fonts: `src/fonts/`,
    css: `${themePath}/blocks`,
  },
  watch: {
    js: `${assetsPath}/src/scripts`,
    css: `src/styles`,
    cssBlocks: `${themePath}/blocks`,
    cssCustom: `${themePath}`
  },
  build: {
    js: `${assetsPath}/js/`,
    fonts: `${assetsPath}/fonts/`,
    css: `${assetsPath}/css/`
  }
};

module.exports = cfg;