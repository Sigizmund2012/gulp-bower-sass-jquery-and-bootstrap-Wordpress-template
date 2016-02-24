// ==== ИНСТРУМЕНТЫ ==== //

var gulp        = require('gulp'), 
	plugins     = require('gulp-load-plugins')({ camelize: true }), 
	del         = require('del'), 
	config      = require('../../gulpconfig').utils
;

// Полностью удаляет всё из папки `dist`, также запускает задачу Bower для получения последних версий файлов
gulp.task('utils-wipe', [], function(cb) {
  del(config.wipe, cb);
});

// Чистит папку `build` от ненужных файлов
gulp.task('utils-clean', ['build', 'utils-wipe'], function(cb) {
  del(config.clean, cb);
});

// Копирует файлы из папки `build` в `dist/[project]`
gulp.task('utils-dist', ['utils-clean'], function() {
  return gulp.src(config.dist.src)
  .pipe(gulp.dest(config.dist.dest));
});
