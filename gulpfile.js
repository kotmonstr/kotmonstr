var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;



gulp.task('test',function(){
    console.log('Test');
});

// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./frontend/web"
            //proxy: {
            //    target: 'http://kotmonstr.loc'
            //}
        }

        //notify:false
    });
    gulp.watch("*.html").on("change", reload);
    //gulp.watch("*.php").on("change", reload);
});