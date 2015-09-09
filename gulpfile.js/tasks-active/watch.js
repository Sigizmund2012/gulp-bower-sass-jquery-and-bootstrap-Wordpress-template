// ==== WATCH ==== //

var gulp        = require('gulp'), 
    plugins     = require('gulp-load-plugins')({ camelize: true }), 
    config      = require('../../gulpconfig').watch
;

// Watch (BrowserSync версия): собирает проект, если файлы были изменены, позволяет BrowserSync перезагрузить страницу
// Цепочка задач: build -> browsersync -> watch
gulp.task('watch-browsersync', ['browsersync'], function() {
  gulp.watch(config.src.styles, ['styles']);
  gulp.watch(config.src.scripts, ['scripts']);
  gulp.watch(config.src.images, ['images']);
  gulp.watch(config.src.theme, ['theme']);
});

// Watch (Livereload версия): собирает проект, если файлы были изменены, информирует livereload о том, что папка `build` или `dist` была изменена
// Цепочка задач: build -> livereload -> watch
gulp.task('watch-livereload', ['livereload'], function() {
  gulp.watch(config.src.styles, ['styles']);
  gulp.watch(config.src.scripts, ['scripts']);
  gulp.watch(config.src.images, ['images']);
  gulp.watch(config.src.theme, ['theme']);
  gulp.watch(config.src.livereload).on('change', function(file) {
    plugins.livereload.changed(file.path);
  });
});

// Определение вотчера и установка задачи
gulp.task('watch', ['watch-'+config.watcher]);
