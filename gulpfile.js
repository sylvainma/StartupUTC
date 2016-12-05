var gulp = require('gulp'),
	notify = require('gulp-notify'),
	del = require('del'),
	concat = require('gulp-concat');

var front = 'src/front',
    back = 'src/back'

gulp.task('back', function() {

  gulp.src(back + '/**/*', { dot : true })
  .pipe(gulp.dest('dist/'))

});

gulp.task('front', function() {

  gulp.src(front + '/index.html')
  .pipe(concat('app.blade.php'))
  .pipe(gulp.dest('dist/resources/views'))

  gulp.src([front + '/**/*', '!' + front + '/index.html'])
  .pipe(gulp.dest('dist/public'))

});

gulp.task('clean', function() {
    return del(['dist/*']);
});

gulp.task('default', ['clean'], function() {
    gulp.start('back', 'front');
});

gulp.task('watch', function() {

  gulp.watch(back + '/**/*', ['back']);
  gulp.watch(front + '/**/*', ['front']);

});
