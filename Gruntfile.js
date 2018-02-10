module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            options: {livereload: true},
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
                    sourceMap: false
                },
                files: [{
                    expand: true,
                    cwd: 'src/sass/',
                    src: ['*.scss'],
                    dest: 'dist/css/',
                    ext: '.css'
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
        connect: {
            server: {
                options: {
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
    grunt.loadNpmTasks('grunt-contrib-htmlmin');
    grunt.loadNpmTasks('grunt-contrib-connect');

    // Set task aliases
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['pug', 'sass', 'postcss', 'htmlmin']);
    grunt.registerTask('serve', ['connect', 'watch']);
};
