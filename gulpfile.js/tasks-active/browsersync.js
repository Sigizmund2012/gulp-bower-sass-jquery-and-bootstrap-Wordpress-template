// ==== BROWSERSYNC ==== //

var gulp        = require('gulp'), 
	browsersync = require('browser-sync'), 
	config      = require('../../gulpconfig').browsersync
;

// BrowserSync: удостоверьтесь, что установлен `proxy` в `/gulpconfig.js`
gulp.task('browsersync', ['build'], function() {
  browsersync(config);
});
