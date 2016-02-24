// ==== BOWER ==== //

var gulp        = require('gulp'), 
	plugins     = require('gulp-load-plugins')({ camelize: true }), 
	config      = require('../../gulpconfig').bower
;

gulp.task('bower', [ 'bower-fonts-open-sans', 'bower-fonts-awesome' ]);

// Копирует шрифт awesome в папку `src` и `build`
gulp.task('bower-fonts-awesome', function() {
	return gulp.src(config.fonts.awesome.src)
		.pipe(gulp.dest(config.fonts.awesome.dest))
		.pipe(gulp.dest(config.fonts.awesome.destBuild));
});

// Копирует шрифт font-awesome в папку `src` и `build`
gulp.task('bower-fonts-open-sans', function() {
	return gulp.src(config.fonts.openSans.src)
		.pipe(gulp.dest(config.fonts.openSans.dest))
		.pipe(gulp.dest(config.fonts.openSans.destBuild));
});

// Копирует папку `bootstrap-sass/assets/stylesheets/` из `bower_components` в `src`. Запускать вручную 'gulp bower-bootstrap'
gulp.task('bower-bootstrap', function() {
  return gulp.src(config.bootstrap.src)
  .pipe(gulp.dest(config.bootstrap.dest));
});
