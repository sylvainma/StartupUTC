const elixir = require('laravel-elixir');

var gulp = require('gulp'),
	notify = require('gulp-notify'),
	del = require('del'),
	concat = require('gulp-concat'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps');

var src = 'resources';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
	mix.task('default');
});

gulp.task('default', ['clean'], function() {
    gulp.start('app', 'assets');
});

gulp.task('clean', function() {
    return del(['public/app/**/*', 'public/assets/**/*']);
});

gulp.task('watch', function() {
  gulp.watch('resources/**/*', ['default']);
});

gulp.task('assets', function() {

  // Material Kit Pro CSS
  gulp.src(src + '/assets/sass/materialize.scss')
	.pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
	.pipe(sourcemaps.write())
  .pipe(gulp.dest('public/assets/css'));

	// StartupUTC CSS
	gulp.src(src + '/assets/sass/style.scss')
	.pipe(sourcemaps.init())
	.pipe(sass().on('error', sass.logError))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('public/assets/css'));

	// assets
	gulp.src([src + '/assets/**/*', '!' + src + '/assets/{sass,sass/**}'])
	.pipe(gulp.dest('public/assets'))

});

gulp.task('app', function() {

	// Vendor
	var angular = [
		src + '/app/vendor/underscore.min.js',
    src + '/app/vendor/angular.min.js',
    src + '/app/vendor/angular-resource.min.js',
		src + '/app/vendor/angular-materialize.min.js',
    //src + '/app/vendor/angular-route.min.js',
    //src + '/app/vendor/ui-bootstrap-2.2.0.min.js',
		//src + '/app/vendor/arrive.min.js',
		//src + '/app/vendor/nouislider.min.js',
  ];
  gulp.src(angular)
  .pipe(concat('vendor.js'))
	.pipe(sourcemaps.init())
	.pipe(sourcemaps.write())
  .pipe(gulp.dest('public/app/vendor'))

	// Env
  gulp.src(src + '/app/env.js')
  .pipe(gulp.dest('public/app'))

  // App
	var app = [
		src + '/app/app.js',
		src + '/app/services/**/*.js',
		src + '/app/directives/**/*.js',
		src + '/app/components/**/*.js',
	];
  gulp.src(app)
	.pipe(concat('app.js'))
	.pipe(sourcemaps.init())
	.pipe(sourcemaps.write())
  .pipe(gulp.dest('public/app'))

  // Components
  gulp.src(src + '/app/components/**/*.html')
  .pipe(gulp.dest('public/app/components'))

  // Directives
  gulp.src(src + '/app/directives/**/*.html')
  .pipe(gulp.dest('public/app/directives'))

});
