var gulp = require('gulp'),
	notify = require('gulp-notify'),
	del = require('del'),
	concat = require('gulp-concat');

var front = 'src/front',
		dist_front = 'dist/public',
    back = 'src/back';

gulp.task('back', function() {

  gulp.src(back + '/**/*', { dot : true })
  .pipe(gulp.dest('dist/'))

});

gulp.task('front_assets_vendor', function() {

	/*
	 *	jQuery
	 */

	gulp.src(front + '/node_modules/jquery/dist/jquery.min.js')
	.pipe(gulp.dest(dist_front+'/assets/vendor/jquery'))

	/*
	 *	Bootstrap
	 */

	gulp.src(front + '/node_modules/bootstrap/dist/css/bootstrap.min.css')
  .pipe(gulp.dest(dist_front+'/assets/vendor/bootstrap/css'))

	gulp.src(front + '/node_modules/bootstrap/dist/js/bootstrap.min.js')
  .pipe(gulp.dest(dist_front+'/assets/vendor/bootstrap/js'))

	gulp.src(front + '/node_modules/bootstrap/dist/fonts/*')
  .pipe(gulp.dest(dist_front+'/assets/vendor/bootstrap/fonts'))

	/*
	 *	Bootstrap Material
	 */

	gulp.src(front + '/node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css')
  .pipe(gulp.dest(dist_front+'/assets/vendor/bootstrap-material-design/css'))

	gulp.src(front + '/node_modules/bootstrap-material-design/dist/css/ripples.min.css')
  .pipe(gulp.dest(dist_front+'/assets/vendor/bootstrap-material-design/css'))

	gulp.src(front + '/node_modules/bootstrap-material-design/dist/js/material.min.js')
  .pipe(gulp.dest(dist_front+'/assets/vendor/bootstrap-material-design/js'))

	gulp.src(front + '/node_modules/bootstrap-material-design/dist/js/ripples.min.js')
  .pipe(gulp.dest(dist_front+'/assets/vendor/bootstrap-material-design/js'))

});

gulp.task('front_app_vendor', function() {

	/*
	 *	AngularJS
	 */

	var angular = [
		front + '/node_modules/angular/angular.min.js',
		front + '/node_modules/angular-resource/angular-resource.min.js',
		front + '/node_modules/angular-route/angular-route.min.js'
	];

	gulp.src(angular)
	.pipe(concat('angular.min.js'))
  .pipe(gulp.dest(dist_front + '/app/vendor'))

});

gulp.task('front', ['front_assets_vendor', 'front_app_vendor'], function() {

	/*
	 *	Index.html
	 */

  gulp.src(front + '/index.html')
  .pipe(concat('app.blade.php'))
  .pipe(gulp.dest('dist/resources/views'))

	gulp.src(front + '/app/**/*.html')
  .pipe(gulp.dest('dist/public/app'))

	gulp.src([front + '/app/app.js', front + '/app/**/*.js'])
	.pipe(concat('app.js'))
  .pipe(gulp.dest(dist_front + '/app'))

});

gulp.task('clean', function() {
    return del(['dist/*']);
});

gulp.task('default', ['clean'], function() {
    gulp.start('back', 'front');
});

gulp.task('watch', function() {

  gulp.watch(back + '/**/*.*', ['back']);
  gulp.watch(front + '/**/*.*', ['front']);

});
