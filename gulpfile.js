//var elixir = require('laravel-elixir');

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

//elixir(function(mix) {
//    mix.sass('app.scss');
//});

var gulp        = require('gulp');
var sass        = require('gulp-ruby-sass') ;
var browserSync = require('browser-sync');

gulp.task('css', function() {

	return gulp.src('resources/assets/sass/*.scss')
		.pipe( sass({ style : 'compressed', 'sourcemap=none': true }) )
		.pipe(gulp.dest('public/css'))
		.pipe( browserSync.reload({stream:true}) )

});

gulp.task('js', function () {

	/*
	 gulp.src('app/assets/js/js/*.js')
	 .pipe(uglify())
	 .pipe(concat('all.js'))
	 .pipe(gulp.dest('js'));
	 */

});

gulp.task('browser-sync', function() {
	browserSync({
		proxy: "ellie.app:80",
		open: false,
		notify: false
	});
});

gulp.task('bs-reload', function () {
	browserSync.reload();
});

gulp.task('watch', ['css', 'js'], function(){
	gulp.watch('resources/assets/sass/**/*.scss', ['css']);
	gulp.watch('resources/assets/js/*.js', ['js']);
	gulp.watch("app/**/*", ['bs-reload']);
	gulp.watch("resources/**/*", ['bs-reload']);
});

gulp.task('default', ['watch', 'browser-sync']);

