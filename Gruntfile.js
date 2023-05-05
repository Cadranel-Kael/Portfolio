module.exports = function (grunt) {
    const sass = require('node-sass');
    grunt.initConfig({
        package: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                implementation: sass,
            },
            dist: {
                files: {
                    'resources/css/styles.css': 'resources/scss/main.scss'
                }
            }
        },
        ts: {
            default : {
                tsconfig: './resources/ts/tsconfig.json'
            }
        },
        uglify: {
            jsUglifyAll: {
                files: [
                    {
                        'public/js/main.min.js': 'resources/js/main.js'
                    }
                ]
            }
        },
        cssmin: {
            target: {
                files: {
                    'public/css/styles.min.css': ['resources/css/*.css']
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 10 versions', 'ie 8', 'ie 9']
            },
            target: {
                files: {
                    'resources/css/styles.css': 'resources/css/styles.css'
                }
            },
        },
        watch: {
            files: ['*.php', 'resources/js/*.ts', 'resources/scss/*.scss', 'resources/scss/*/*.scss', 'resources/scss/*/*/*.scss'],
            tasks: ['sass', 'autoprefixer', 'cssmin', 'ts', 'uglify'],
            options: {
                livereload:true
            }
        },
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks("grunt-ts");

    grunt.registerTask('prod', ['sass', 'autoprefixer', 'cssmin', 'ts', 'uglify']);
    grunt.registerTask('default', ['prod', 'watch']);
};

