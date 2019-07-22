'use strict';

// Node/Gulp plugins
const gulp    = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const merge   = require('merge-stream');
const plugins = require('gulp-load-plugins')({ camelize: true });
const through = require('through2');
const browserSync = require('browser-sync').create();
const favicons = require("gulp-favicons");
const sassGlob = require('gulp-sass-glob');
const open = require('gulp-open');


gulp.task("favicons", function () {
    return gulp.src("src/img/favicons/favicon.png").pipe(favicons({
    }))
    .pipe(gulp.dest("./dist/img/favicons/"));
});


// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
//    './src/scss/*/*.scss',
//    './src/scss/*/*/*.scss',
//    './src/scss/*.scss',
//    './src/js/*.js',
    '*.php',
    './partials/*.php',
    './partials/*/*.php',
    ];

    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "http://albanymembers.local/",
    notify: false
    });
});

//Open FIWI Tester AKA Sizzy
gulp.task('uri', function(){
//  gulp.src(__filename)
//  .pipe(open({uri: 'http://tester.findsomewinmore.com?url=http://localhost:3000'}));
});

// CSS task
gulp.task('styles', () => {
  return gulp.src('src/scss/main.scss')
    .pipe(sassGlob())
    .pipe(sourcemaps.init())
    .pipe(plugins.plumber({}))
    .pipe(plugins.sass({ outputStyle: 'compressed' }))
    .on('error', plugins.sass.logError)
    .pipe(plugins.postcss([
      require('autoprefixer')({ browsers: ['last 2 versions', 'last 2 iOS versions', 'ie >= 9'] }),
      require('postcss-flexbugs-fixes')
    ]))
    .pipe(plugins.rename('styles.min.css'))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('dist/css'))
    .pipe(browserSync.stream())
    .pipe(plugins.size({ title: 'styles' }));
});


// Admin CSS task
gulp.task('admin-styles', () => {
  return gulp.src('admin/scss/main.scss')
    .pipe(sourcemaps.init())
    .pipe(plugins.plumber())
    .pipe(plugins.sass({
      outputStyle: 'compressed' }))
    .pipe(plugins.postcss([
      require('autoprefixer')({ browsers: ['last 2 versions', 'ie >= 9', 'and_chr >= 2.3'] }),
      require('postcss-flexbugs-fixes')]
    ))
    .pipe(plugins.rename('styles.min.css'))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('admin/css'))
    .pipe(browserSync.stream())
    .pipe(plugins.size({ title: 'admin-styles' }));
});

gulp.task('modernizr', () => {
  return gulp.src('src/js/**/*.js')
    .pipe(plugins.modernizr())
    .pipe(plugins.concat('modernizr.min.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest("dist/js/vendor/"))
});

// Fonts
gulp.task('fonts', () => {
  return gulp.src([
      'src/fonts/**/*',
      'node_modules/font-awesome/fonts/*',
//      'node_modules/slick-carousel/slick/fonts/*',
    ])
  .pipe(gulp.dest('dist/fonts'))
})

// Scripts task
gulp.task('scripts', () => {
  return gulp.src([
      'node_modules/outdated-browser/outdatedbrowser/outdatedbrowser.js',
      'src/js/**/*.js',
      '!src/js/vendor/*.js'
    ])
    .pipe(plugins.plumber())
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.babel())
    .pipe(plugins.concat('scripts.min.js'))
    .pipe(plugins.uglify())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('dist/js'))
    .pipe(browserSync.stream())
    .pipe(plugins.size({ title: 'scripts' }));
})


// Vendor JS
gulp.task('vendor', () => {
  return gulp.src('src/js/vendor/*')
  .pipe(gulp.dest('dist/js/vendor'))
})

// Optimizes images
gulp.task('images', () => {
  return gulp.src('src/img/**/*')
    .pipe(plugins.plumber())
    .pipe(plugins.imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [require('imagemin-pngquant')()]
    }))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('dist/img'))
    .pipe(plugins.size({ title: 'images' }));
});

// Build task
gulp.task('build', ['styles', 'admin-styles', 'scripts', 'modernizr', 'images', 'fonts', 'favicons']);

// Watch task
gulp.task('watch', () => {
  gulp.watch(['src/img/**/*'], ['images', 'favicons']);
  gulp.watch(['src/fonts/**/*'], ['fonts']);
  gulp.watch(['src/scss/**/*.scss'], ['styles', 'modernizr']);
  gulp.watch(['admin/scss/*.scss'], ['admin-styles', 'modernizr']);
  gulp.watch(['src/js/**/*.js'], ['scripts', 'modernizr', 'vendor']);
});


//var uncss = require('gulp-uncss');
//var rename = require('gulp-rename');

//gulp.task('uncss', function () {
//
//    gulp.src('dist/css/styles.min.css')
//        .pipe(uncss({
//    	ignore: [],
//        html: []
//        })).pipe(rename({
//            suffix: '.clean'
//        }))
//
//    .pipe(gulp.dest('dist/css/'));
//
//});

// Default task w UNCSS
//gulp.task('default', ['build', 'watch', 'uncss',]);

// Default task
gulp.task('default', ['build', 'browser-sync', 'uri', 'watch']);
