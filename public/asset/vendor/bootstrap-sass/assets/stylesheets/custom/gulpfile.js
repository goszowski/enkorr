'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var purify = require('gulp-purifycss');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var rename = require('gulp-rename');

var sourcePattern = '../../../../fonts/';
var sourceBootstrap =  './vendor/bootstrap-sass/assets/stylesheets/bootstrap.scss'
var distPath = './dist/css';
var templatesPattern = '../../resources/views/templates/**/*.php';

gulp.task('bootstrap', function () {
	return gulp.src(sourceBootstrap)
	.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(sourcemaps.init())
	.pipe(sass({outputStyle: 'expand'}).on('error', sass.logError))
	//.pipe(cleanCSS()) //розкоментувати для мініфікації
	.pipe(sourcemaps.write('../'))
	.pipe(gulp.dest(distPath))
	.pipe(browserSync.reload({stream: true}));
});


gulp.task('browser-sync', function() {
	browserSync({
		proxy: 'enkorr-backend',
		notify: false,
		// tunnel: true,
		// tunnel: "projectmane", //Demonstration page: http://projectmane.localtunnel.me
	});
});


gulp.task('purify-css', function() {
	return gulp.src(distPath + '/bootstrap.min.css' + 'vendor/font-awesome/css/font-awesome.min.css')
	.pipe(purify([templatesPattern,'../../resources/views/vendor/pagination/default.blade.php']))
	.pipe(cleanCSS())
	.pipe(rename({suffix: '.purify', prefix : ''}))
	.pipe(gulp.dest(distPath));
});

gulp.task('build', ['bootstrap', 'purify-css']);

/*gulp.task('watch', function () {
	return gulp.watch(sourcePattern, ['build']);
});*/


gulp.task('watch', ['bootstrap', 'purify-css', 'browser-sync'], function() {
	gulp.watch(['app/assets/scss/*.scss',sourcePattern], function(event, cb) {
		setTimeout(function(){gulp.start('bootstrap');},0);
	});
	//gulp.watch(['assets/vendor/**/*.js', 'app/assets/js/scripts.js'], browserSync.reload);
	gulp.watch(templatesPattern, browserSync.reload);
});




gulp.task('default', ['watch']);
