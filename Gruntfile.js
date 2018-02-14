module.exports = function(grunt) {
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
                    interrupt: false
                }
            },
            pug: {
                files: ['src/pug/**/*.pug'],
                tasks: ['pug'],
                options: {
                    interrupt: false
                }
            },
            babel: {
                files: ['src/js/**/*.jsx'],
                tasks: ['babel'],
                options: {
                    interrupt: false
                }
            },
            uglify: {
                files: ['dist/js/app/**/*.js'],
                tasks: ['uglify'],
                options: {
                    interrupt: false
                }
            },
            htmlmin: {
                files: ['dist/**/*.html'],
                tasks: ['htmlmin'],
                options: {
                    interrupt: false
                }
            },
            cssmin: {
                files: ['dist/css/main.css'],
                tasks: ['cssmin'],
                options: {
                    interrupt: false
                }
            }
        },
        pug: {
            compile: {
                options: {
                    pretty: true
                },
                files: [{
                    src: ['**/*.pug', '!**/_*.pug'],
                    dest: "dist/",
                    ext: ".html",
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
                    dest: 'dist/css/',
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
                src: ['dist/css/*.css']
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
                    "dest": "dist/js/app",
                    "ext": "-app.js"
                }]
            }
        },
        //CSS min
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'dist/css',
                    src: ['*.css'],
                    dest: 'public/css'
                }]
            }
        },
        //grunt son
        uglify: {
            options: {
                mangle: false
            },
            file_min_js: {
                files: [{
                    expand: true,
                    cwd: 'dist/js/app',
                    src: '**/*.js',
                    dest: 'public/js/app'
                }]
            }
        },
        concat: {
            js: {
                src: 'dist/js/app/*.js',
                dest: 'public/js/app/app-main.js'
            }
        },
        htmlmin: {
            dist: {
                options: {
                    removeComments: true,
                    collapseWhitespace: true
                },
                files: [{
                    expand: true,
                    cwd: 'dist',
                    src: ['*.html'],
                    dest: 'templates'
                }]
            }
        },
        connect:{
            server:{
                options:{
                    port: 9005,
                    hostname: '*',
                    base: 'dist/',
                    livereload: true
                }
            }
        }
    });

    // Load the Grunt plugins.
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-pug');
    grunt.loadNpmTasks('grunt-contrib-watch');
    //Transpiler
    grunt.loadNpmTasks('grunt-babel');
    //CSSMin
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    //son
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-htmlmin');
    grunt.loadNpmTasks('grunt-contrib-connect');

    // Set task aliases
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('css', ['cssmin']);
    grunt.registerTask('serve', ['connect', 'watch']);
    grunt.registerTask('build', ['pug', 'sass', 'postcss', 'babel', 'uglify', 'htmlmin', 'cssmin']);
};
