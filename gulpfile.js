
const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCss = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');

gulp.task('compile', function() {
    // Tarefa realizada pelo gulp
    const stream = gulp.src('resources/assets/sass/**/*.scss')
    // Iniciar a construção de sourcemaps
    .pipe(sourcemaps.init())
      // Compilar Sass para CSS
      .pipe(sass())
      // Minificar arquivos CSS
      .pipe(cleanCss())
      // Adicionar .min a arquivos minificados
      .pipe(rename({
        suffix: '.min'
      }))
    // Finalizar a construção de sourcemaps
    .pipe(sourcemaps.write())
    // Determinar destino dos arquivos
    .pipe(gulp.dest('public/css'));
    // Retornar tarefa realizada
    return stream;
});


gulp.task('watch:sass', function() {
  gulp.watch('resources/assets/sass/*.scss', ['compile']);
});
