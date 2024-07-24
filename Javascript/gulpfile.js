// initalize module 

const{ src ,dest ,watch ,series}= require('gulp');
const sass= require('gulp-sass')(require('sass'));
const postcss=require('gulp=postcss');
const autoprefixer=require('autoprefixer');
const cssnano=require('cssnano');
const babel=require ('gulp-babel');
const terser=require('gulp-terser');
const browsersync=require('brown-sync').create();


// use dart-sass for @use
// sass.complier=require('dark-sass');

// sass task

function scssTask(){
return src('app/scss/style.scss', { sourcemaps:true})
.pipe(sass())
.pipe(postcss([autoprefixer(),cssnano()]))
.pipe(dest('dist',{sourcemaps:' . '}));
}

// Javascipt task 

function jsTask(){
 return src (' app/js/script.js', {sourcemaps:true })
 .pipe(babel({presets:['@babel/preset-env']}))
 .pipe(terser())
 .pipe(dest('dist', {sourcemaps: ' . ' }));

}

//brown sync 

function browsersync(cb){
    browsersync.init({

        server:{
            badeDir: ' . ',
},
notify:{
    styles:{
        top:'auto',
        bottom: '0',
    },
},
});
cb();
}
 function browsersync(cb){
    browsersync.reload();
    cb(); }

    // watch task
    function watchTask(){
        watch('*.htmml', browsersyncReload);
        watch(
        ['app/scss/**/.scss','app/**/*.js'],
        series(scssTask,jsTask,browsersyncReload)
);
}

//defult gulp task 
exports.default =series(scssTask,jsTask,browsersync,watchTask);
 
//Build gulp task
exports.Build=series(scssTask,jsTask);