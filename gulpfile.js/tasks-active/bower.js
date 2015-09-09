// ==== BOWER ==== //

var gulp        = require('gulp'), 
	plugins     = require('gulp-load-plugins')({ camelize: true }), 
	config      = require('../../gulpconfig').bower
;

// Эта задача выполняется при вводе в консоль `bower update` а также `npm update`, используйте её для копирования и трансформации файлов, загруженных через Bower
gulp.task('bower', ['bower-normalize']);

// Хак для обхода бага Sass, в него нельзя импортировать чистый css через @import, смотрите: https://github.com/sass/sass/issues/556
gulp.task('bower-normalize', function() {
  return gulp.src(config.normalize.src)
  .pipe(plugins.changed(config.normalize.dest))
  .pipe(plugins.rename(config.normalize.rename))
  .pipe(gulp.dest(config.normalize.dest));
});

// Копирует папку `bootstrap-sass/assets/fonts/` из `bower_components` в `build`
gulp.task('bower-bootstrap', function() {
  return gulp.src(config.bootstrap.src)
  .pipe(gulp.dest(config.bootstrap.dest));
});
