// ==== ИЗОБРАЖЕНИЯ ==== //

var gulp        = require('gulp'), 
	plugins     = require('gulp-load-plugins')({ camelize: true }), 
	config      = require('../../gulpconfig').images
;

// Копирует изменённые изображения из папки `src` в `build` (быстро)
gulp.task('images', [ 'screen' ], function() {
  return gulp.src(config.build.src)
  .pipe(plugins.changed(config.build.dest))
  .pipe(gulp.dest(config.build.dest));
});

// Копирует screenshot.png из папки `src` в `build`
gulp.task('screen', function() {
	return gulp.src(config.screen.src)
		.pipe(plugins.changed(config.screen.dest))
		.pipe(gulp.dest(config.screen.dest));
});

// Оптимизирует изображения в папке `dist` (медленно)
gulp.task('images-dist', ['utils-dist'], function() {
  return gulp.src(config.dist.src)
  .pipe(plugins.imagemin(config.imagemin))
  .pipe(gulp.dest(config.dist.dest));
});
