// ==== СКРИПТЫ ==== //

var gulp        = require('gulp'), 
    plugins     = require('gulp-load-plugins')({ camelize: true }), 
    merge       = require('merge-stream'), 
    config      = require('../../gulpconfig').scripts
;

// Проверяет ваши скрипты на ошибки
gulp.task('scripts-lint', function() {
  return gulp.src(config.lint.src)
  .pipe(plugins.jshint('.jshintrc'))
  .pipe(plugins.jshint.reporter('default')); // Нет смысла запускать это везде
});

// Генерирует пакеты скриптов, определённых в файле конфигурации
// Адаптировано из https://github.com/gulpjs/gulp/blob/master/docs/recipes/running-task-steps-per-folder.md
gulp.task('scripts-bundle', ['scripts-lint'], function(){
  var bundles = [];

  // Перебирает все пакеты определённые в файле конфигурации
  for (var bundle in config.bundles) {
    if (config.bundles.hasOwnProperty(bundle)) {
      var chunks = [];

      // Перебирает пакеты и склеивает части воедино
      config.bundles[bundle].forEach(function(chunk){
        chunks = chunks.concat(config.chunks[chunk]);
      });

      // Добавляет результаты в массив пакетов
      bundles.push([bundle, chunks]);
    }
  }

  // Перебирает каждый пакет в массиве
  var tasks = bundles.map(function(bundle) {
    return gulp.src(bundle[1]) // bundle[1]: список исходников
    .pipe(plugins.uglify(config.minify.uglify)) // Минификация
    .pipe(plugins.concat(config.namespace + bundle[0].replace(/_/g, '-') + '.js')) // bundle[0]: Конечное имя скрипта, нижние подчёркивания заменяются дефисами
    .pipe(gulp.dest(config.dest));
  });

  // Смешиваем потоки ;)
  return merge(tasks);
});


// Цепочка задач: lint -> bundle -> minify -> concat
gulp.task('scripts', ['scripts-bundle']);
