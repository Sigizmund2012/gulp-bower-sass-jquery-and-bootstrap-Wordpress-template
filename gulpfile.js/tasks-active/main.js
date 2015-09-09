// ==== ОСНОВНОЙ ФАЙЛ ==== //

var gulp = require('gulp');

// Цепочка задач по-умолчанию: build -> (livereload или browsersync) -> watch
gulp.task('default', ['watch']);

// Создание рабочей копии темы
gulp.task('build', ['images', 'scripts', 'styles', 'theme', 'bower-bootstrap']);

// Цепочка задач для продакшена: wipe -> build -> clean -> copy -> images/styles
// Это ресурсоёмкая задача!
gulp.task('dist', ['images-dist', 'styles-dist']);
