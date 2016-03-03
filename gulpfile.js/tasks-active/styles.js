// ==== STYLES ==== //

var gulp          = require('gulp'), 
    gutil         = require('gulp-util'), 
    plugins       = require('gulp-load-plugins')({ camelize: true }), 
    config        = require('../../gulpconfig').styles, 
    autoprefixer  = require('autoprefixer')
;


// Создаёт файл css из файлов Sass , расставляет вендорные префиксы и минифицирует с помощью rubySass
gulp.task('styles-ruby-sass', function() {
  return gulp.src(config.build.src)
  .pipe(plugins.rubySass(config.rubySass))
  .on('error', gutil.log) // Логирует ошибки вместо убийства процесса
  .pipe(plugins.postcss([autoprefixer(config.autoprefixer)])) // Расставляет вендорные префиксы
  .pipe(gulp.dest(config.build.dest)) // Помещает не минимизированный файл в папку `build`
  .pipe(plugins.rename(config.rename))
  .pipe(plugins.cleanCss(config.minify))
  .pipe(gulp.dest(config.build.dest)); // Помещает минимизированный файл в папку `build` для отладки
});

// Создаёт файл css из файлов Sass , расставляет вендорные префиксы и минифицирует с помощью libsass
gulp.task('styles-libsass', function() {
  return gulp.src(config.build.src)
  .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass(config.libsass))
    .pipe(plugins.postcss([autoprefixer(config.autoprefixer)])) // Расставляет вендорные префиксы
  .pipe(plugins.sourcemaps.write()) // Пишет внутреннюю sourcemap
  .pipe(gulp.dest(config.build.dest)) // // Помещает не минимизированный файл в папку `build`
  .pipe(plugins.rename(config.rename))
  .pipe(plugins.sourcemaps.init())
    .pipe(plugins.cleanCss(config.minify))
  .pipe(plugins.sourcemaps.write('./')) // Пишет внешнюю sourcemap
  .pipe(gulp.dest(config.build.dest)); // // Помещает минимизированный файл в папку `build` для отладки
});

// Копирует файлы css из папки `build` в `dist` и минифицирует
gulp.task('styles-dist', ['utils-dist'], function() {
  return gulp.src(config.dist.src)
  .pipe(plugins.sourcemaps.init())
    .pipe(plugins.cleanCss(config.minify))
  .pipe(plugins.sourcemaps.write('./')) // Пишет внешнюю sourcemap
  .pipe(gulp.dest(config.dist.dest));
});

// Определяет компилятор Sass из `/gulpconfig.js`
gulp.task('styles', ['styles-'+config.compiler]);
