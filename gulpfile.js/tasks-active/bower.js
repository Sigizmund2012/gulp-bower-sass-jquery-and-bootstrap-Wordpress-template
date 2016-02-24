// ==== BOWER ==== //

var gulp        = require('gulp'), 
	plugins     = require('gulp-load-plugins')({ camelize: true }), 
	config      = require('../../gulpconfig').bower
;

gulp.task('bower', ['bower-bootstrap']);

// Копирует папку `bootstrap-sass/assets/stylesheets/` из `bower_components` в `src`. Запускать вручную 'gulp bower-bootstrap'
gulp.task('bower-bootstrap', function() {
  return gulp.src(config.bootstrap.src)
  .pipe(gulp.dest(config.bootstrap.dest));
});
