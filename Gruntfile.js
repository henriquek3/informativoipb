module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            options: {
                livereload: true
            },
            scss: {
                files: ['src/sass/**/*.sass', 'src/sass/**/*.scss'],
                tasks: ['sass', 'postcss'],
                options: {
                    interrupt: true
                }
            },
            pug: {
                files: ['src/pug/**/*.pug'],
                tasks: ['pug'],
                options: {
                    interrupt: true
                }
            },
            babel: {
                files: ['src/js/**/*.jsx'],
                tasks: ['babel'],
                options: {
                    interrupt: false
                }
            },
        },
        pug: {
            compile: {
                options: {
                    pretty: true
                },
                files: [{
                    src: ['**/*.pug', '!**/_*.pug'],
                    dest: "resources/views/pages/",
                    ext: ".blade.php",
                    cwd: "src/pug/",
                    expand: true
                }]
            }
        },
        sass: {
            dist: {
                options: {
                    outputStyle: 'expanded',
                    sourceMap: true
                },
                files: [{
                    expand: true,
                    cwd: 'src/sass/',
                    src: ['*.sass'],
                    dest: 'public/css/',
                    ext: '.min.css'
                }]
            }
        },
        postcss: {
            options: {
                map: false,
                processors: [
                    require('autoprefixer')({browsers: 'last 3 versions'})
                ]
            },
            dist: {
                src: ['public/css/*.css']
            }
        },
        //Transpiler
        babel: {
            options: {
                "sourceMap": true
            },
            dist: {
                files: [{
                    "expand": true,
                    "cwd": "src/js",
                    "src": ["**/*.jsx"],
                    "dest": "public/js/app",
                    "ext": "-app.js"
                }]
            }
        },

    });

    // Load the Grunt plugins.
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-pug');
    grunt.loadNpmTasks('grunt-contrib-watch');
    //Transpiler
    grunt.loadNpmTasks('grunt-babel');

    // Set task aliases
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('serve', ['watch']);
    grunt.registerTask('build', ['pug', 'sass', 'postcss', 'babel']);
};