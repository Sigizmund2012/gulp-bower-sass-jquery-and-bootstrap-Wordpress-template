// ==== BOWER ==== //

var gulp        = require('gulp'), 
	plugins     = require('gulp-load-plugins')({ camelize: true }), 
	config      = require('../../gulpconfig').bower
;

// Эта задача выполняется при вводе в консоль `bower update` а также `npm update`, используйте её для копирования и трансформации файлов, загруженных через Bower
gulp.task('bower', ['bower-bootstrap']);

// Копирует папку `bootstrap-sass/assets/fonts/` из `bower_components` в `build`
gulp.task('bower-bootstrap', function() {
  return gulp.src(config.bootstrap.src)
  .pipe(gulp.dest(config.bootstrap.dest));
});
