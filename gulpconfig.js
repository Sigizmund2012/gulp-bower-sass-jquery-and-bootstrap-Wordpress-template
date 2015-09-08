// ==== КОНФИГУРАЦИЯ ==== //

// Папки проекта
var project     = 'smart', 
    src         = './src/', 
    build       = '../themes/build' + project + '/', 
    dist        = '../themes/'+project+'/', 
    bower       = './bower_components/', 
    composer    = './vendor/'
;

// Настройки проекта
module.exports = {

  bower: {
    normalize: { // Копирует `normalize.css` из `bower_components` в `src/scss` и переименовывает его для импорта как Sass файл
      src: bower+'normalize.css/normalize.css', 
      dest: src+'scss', 
      rename: '_normalize.scss'
    },
    bootstrap: { // Копирует папку `fonts` из `bower_components` в `build`
      src: bower + 'bootstrap-sass/assets/fonts/**/*', 
      dest: build + 'fonts/' 
    }
  },

  browsersync: {
    files: [build+'/**', '!'+build+'/**.map'], // Исключает map файлы
    notify: false, // In-line нотификации ( блоки текста, говорящие подключились ли вы к серверу BrowserSync или нет )
    open: true, // Поставьте false если вы не хотите, чтобы окно браузера открывалось автоматически
    port: 3000, // Номер порта для live версии сайта; default: 3000
    proxy: 'smartfreelancer.ru', // Использование прокси-сервера, а не встроенного сервера, чтобы сделать рендеринг с помощью WordPress
    watchOptions: {
      debounceDelay: 2000 // Задержка для событий, вызываемых подряд для того же файла / события
    }
  },

  images: {
    build: { // Копирует изображения из `src` в `build` без оптимизации
      src: src+'**/*(*.png|*.jpg|*.jpeg|*.gif)', 
      dest: build
    }, 
    dist: {
      src: [dist+'**/*(*.png|*.jpg|*.jpeg|*.gif)', '!'+dist+'screenshot.png'], 
      imagemin: {
        optimizationLevel: 7, 
        progressive: true, 
        interlaced: true
      }, 
      dest: dist
    }
  },

  livereload: {
    port: 35729
  },

  scripts: {
    bundles: { // Связи определяются по имени, массив служит для конкатенации файлов. Внимание! Придётся управлять зависимостями вручную
      jquery: ['jquery'],
      main: ['main']
    }, 
    chunks: { // В массивах содержатся файлы для конкатенации
      jquery: [bower+'jquery/dist/jquery.js'],
      main: [src+'js/main.js']
    }, 
    dest: build+'js/', // Папка, куда скрипты будут положены после обработки
      lint: {
      src: [src+'js/**/*.js'] // Проверка на ошибки ваших скриптов. Скрипты, загруженные через bower не проверяются
    }, 
    minify: {
      src: [build+'js/**/*.js', '!'+build+'js/**/*.min.js'], // Предотвращает рекурсию min.min.min.js
      rename: { suffix: '.min' }, 
      uglify: {}, 
      dest: build+'js/'
    }, 
    namespace: '' // Префикс к именам файлов скриптов, оставьте пустую строку, если это не нужно
  },

  styles: {
    build: {
      src: [src+'scss/*.scss', '!'+src+'scss/_*.scss'], // Игнорирует файлы для импорта
      dest: build
    }, 
    dist: {
      src: [dist+'**/*.css', '!'+dist+'**/*.min.css'], 
      dest: dist
    }, 
    compiler: 'libsass', // Выбор компилятора Sass: 'libsass' или 'ruby-sass'
    autoprefixer: { browsers: ['> 3%', 'last 2 versions', 'ie 9', 'ios 6', 'android 4'] }, 
    rename: { suffix: '.min' }, 
    minify: { keepSpecialComments: 1, roundingPrecision: 3 }, 
    rubySass: { // Требует Ruby для обработки Sass; запустите `gem install sass` если вы его используете; Compass по-умолчанию не включён
      loadPath: bower, // Добавляет папку `bower_components` в путь загрузки, вы можете использовать @import без указания полного пути
      precision: 6,
      'sourcemap=none': true // Эта фича пока не работает должным образом, поэтому отключаем
  }, 
  libsass: { // Требует libsass для обработки Sass
      includePaths: [bower], // Добавляет папку `bower_components` в путь загрузки, вы можете использовать @import без указания полного пути
      precision: 6, 
      onError: function(err) {
        return console.log(err);
      }
    }
  },

  theme: {
    lang: {
      src: src+'languages/**/*', // Переносит файлы локализаций
      dest: build+'languages/'
    }, 
    php: {
      src: src+'**/*.php', 
      dest: build
    }
  },

  utils: {
    clean: [build+'**/.DS_Store'], // Удаляет лишние файлы из `build`
    wipe: [dist], // Очищает папку перед созданием новой копии проекта
    dist: {
      src: [build+'**/*', '!'+build+'**/*.min.css*'],
      dest: dist
    }
  },

  watch: { // Отслеживаемые файлы
    src: {
      styles:       src+'scss/**/*.scss', 
      scripts:      [src+'js/**/*.js', bower+'**/*.js'], 
      images:       src+'**/*(*.png|*.jpg|*.jpeg|*.gif)', 
      theme:        src+'**/*.php', 
      livereload:   [build+'**/*']
    }, 
    watcher: 'browsersync' // Кто watcher? Переключайтесь между BrowserSync ('browsersync') и Livereload ('livereload')
  }
};
