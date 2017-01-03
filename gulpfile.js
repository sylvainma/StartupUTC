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

gulp.task('back_without_vendor', function() {

  gulp.src([back + '/**/*', '!' + back + '/vendor/**'], { dot : true })
  .pipe(gulp.dest('dist/'))

});

gulp.task('front', function() {

	/*
	 *	Index.html
	 */

  gulp.src(front + '/index.html')
  .pipe(concat('app.php'))
  .pipe(gulp.dest('dist/resources/views'))

});

gulp.task('clean', function() {
    return del(['dist/*']);
});

gulp.task('default', ['clean'], function() {
    gulp.start('back', 'front');
});

gulp.task('watch', function() {

  gulp.watch(back + '/**/*.*', ['back_without_vendor']);
  gulp.watch(front + '/**/*.*', ['front']);

});
