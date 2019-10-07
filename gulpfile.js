var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var livereload = require('gulp-livereload');


// gulp.task('watch', function(){
//     gulp.watch('./css/*.css', gulp.series('css'));
// proxy: "localhost:8888"


// });

gulp.task('serve', function(){

    // browserSync.init({
    //     server: "./"
    // });
  browserSync.init(["css/*.css", "js/*.js"], {
        server: {
            baseDir: "./"
        }
    });

     gulp.watch("*.html").on('change', browserSync.reload);
     livereload.listen();  
});




// gulp.task('browser-sync', function() {  
//     browserSync.init(["css/*.css", "js/*.js"], {
//         server: {
//             baseDir: "./"
//         }
//     });
//      gulp.watch("*.html").on('change', browserSync.reload);
// });