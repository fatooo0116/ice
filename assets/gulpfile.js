// 載入 gulp
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var gulpSass = require('gulp-sass');
var del = require('del');
var concat = require('gulp-concat');




var paths = {
  styles: './sass/**/*.scss',
  bootstrap: ['./sass/bootstrap.scss','./sass/bootstrap'],
//  material: ['./sass/materialize/materialize.scss','./sass/materialize/*/*.scss'],
  scripts: './js/src/*.js',
  images: './img/*'
};






// Not all tasks need to use streams
// A gulpfile is just another node program and you can use any package available on npm
gulp.task('clean', function() {
  // You can use multiple globbing patterns as you would with `gulp.src`
  return del(['build']);
});


// Copy all static images
/*
gulp.task('images', ['clean'], function() {
  return gulp.src(paths.images)
    // Pass in options to the task
    .pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('./img'));
});
*/




gulp.task('styles', function () {
  return gulp.src(paths.styles)   // 指定要處理的 Scss 檔案目錄
        .pipe(sourcemaps.init())
        .pipe(gulpSass({          // 編譯 Scss
            outputStyle: 'compressed'
        }))         // 編譯 Scss
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./css'));  // 指定編譯後的 css 檔案目錄
});




gulp.task('bootstrap', function () {
  return gulp.src(paths.bootstrap)
        .pipe(sourcemaps.init())
        .pipe(gulpSass({
            outputStyle: 'compressed'
        }))         // 編譯 Scss
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./css'));
});








gulp.task('scripts', ['clean'], function() {
  // Minify and copy all JavaScript (except vendor scripts)
  // with sourcemaps all the way down
  return gulp.src(paths.scripts)
    .pipe(sourcemaps.init())
      .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(concat('script.js'))
    .pipe(gulp.dest('./js'));
});




// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch(paths.scripts, ['scripts']);
  gulp.watch(paths.styles, ['styles']);
  gulp.watch(paths.bootstrap, ['bootstrap']);
  // gulp.watch(paths.images, ['images']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch','bootstrap','scripts','styles']);
