/* -------------------------------
   General
---------------------------------- */

/* Include Gulp */

var gulp = require('gulp'); 

/* Include Plugins */

var clean = require('gulp-clean');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var watch = require('gulp-watch');

/* Installation command: 
    npm install gulp-clean gulp-jshint gulp-sass gulp-watch
*/


/* Clean */

gulp.task('clean', function () {  
  return gulp.src('build', {read: false})
    .pipe(clean());
});



/* -------------------------------
   Preprocessors plugins 
---------------------------------- */

/* SASS */

gulp.task('sass', function() {
    return gulp.src('scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('css'));
});


/* -------------------------------
   Other plugins
---------------------------------- */


/* Javascript debugger */

gulp.task('jshint', function() {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

/* Watch files for changes */

gulp.task('watch', function() {
    gulp.watch('scss/*.scss', ['sass']);
});

/* Default tasks */

gulp.task('default', ['clean', 'jshint', 'sass', 'watch']);