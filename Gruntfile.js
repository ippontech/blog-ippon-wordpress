
module.exports = function(grunt) {

  // Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    tmp: '.tmp',
    dist: 'dist',
    test: 'test',
    screenshots: ['http://localhost:8888'],
    // grunt-express will serve the files from the folders listed in `bases`
    // on specified `port` and `hostname`
    express: {
      all: {
        options: {
          port: 8888,
          hostname: "0.0.0.0",
          bases: ['.']
        }
      }
    },
    // grunt-open will open your browser at the project's URL
    open: {
      all: {
        // Gets the port from the connect configuration
        path: 'http://localhost:<%= express.all.options.port%>'
      }
    },
    //
    casper: {
      screenshots : {
        options : {
          test : false
        },
        src: ['<%= test %>/rendering/screenshots-index.js','<%= test %>/rendering/screenshots-post.js'],
        dest: '<%= test %>/rendering'
      }
    },
    // 
    clean: {
      dist: [
        '<%= tmp %>'
      ]
    },
    // Réalise le pré-processing CSS via Compass
    compass: {
      dist:{
        options: {
          sassDir: 'styles',
          specify: 'styles/style.scss',
          cssDir: '<%= tmp %>/styles',
          outputStyle: 'compressed'
        }        
      }
    },
    // Copie les fichiers
    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'views/',
          src: ['**'],
          dest: '<%= tmp %>'
        },
        {
          expand: true,
          cwd: 'img/',
          src: ['**'],
          dest: '<%= tmp %>/img'
        },
        {
          expand: true,
          cwd: 'img/',
          src: ['favicon_16x16.ico', 'favicon_32x32.png'],
          dest: '<%= tmp %>'
        }]
      },
      dev: {
        files: [{
          expand: true,
          cwd: 'views/',
          src: ['**'],
          dest: '<%= dist %>'
        },
        {
          expand: true,
          cwd: 'js/',
          src: ['**'],
          dest: '<%= dist %>/js'
        },
        {
          expand: true,
          cwd: 'img/',
          src: ['**'],
          dest: '<%= dist %>/img'
        },
        {
          expand: true,
          cwd: 'img/',
          src: ['favicon_16x16.ico', 'favicon_32x32.png'],
          dest: '<%= dist %>'
        }]
      },
    },

    // jshint: {
    //   options : {
    //     jshintrc : '.jshintrc'
    //   },
    //   all : ['tasks/**/*.js', 'test/*.js', 'Gruntfile.js']
    // },

    uglify: {
      dist: {
        files: {
          '<%= tmp %>/js/scripts.min.js': [
          'js/functions.js'
          ]
        }
      }
    },

    // version: {
    //   options: {
    //     file: 'lib/scripts.php',
    //     css: '<%= tmp %>/styles/style.css',
    //     cssHandle: 'roots_main',
    //     js: '<%= tmp %>/js/scripts.min.js',
    //     jsHandle: 'roots_scripts'
    //   }
    // },

    // Prise en compte des fichiers modifiés
    watch: {
      copy: {
        files: ['views/**', 'js/**', 'img/**'],
        tasks: ['copy:dev']
      },
      compass: {
        files: ['styles/**/*.{scss,sass}'],
        tasks: ['compass']
        // ,
        // options: {
        //   livereload: true
        // }
      }
    }
  });

  // grunt.loadTasks('tasks');

  // plugin de suppression de fichiers
  grunt.loadNpmTasks('grunt-contrib-clean');
  // plugin pour copier les fichiers
  grunt.loadNpmTasks('grunt-contrib-copy');
  // plugin de pré-processing CSS via Compass
  grunt.loadNpmTasks('grunt-contrib-compass');
  //
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // plugin pour prendre en compte les modifications à chaud
  grunt.loadNpmTasks('grunt-contrib-watch');
  // grunt.loadNpmTasks('grunt-express');
  // grunt.loadNpmTasks('grunt-open');

  // plugin pour lancer CasperJS
  grunt.loadNpmTasks('grunt-casper');
  // 
  grunt.loadNpmTasks('grunt-wp-version');


  // Réalise le "live reload"
  // grunt.loadNpmTasks('grunt-livereload');


  // Creates the `server` task
  grunt.registerTask('server', [
    'express',
    'open',
    'express-keepalive'
  ]);
  // Réalise la distribution
  grunt.registerTask('build', [
    'clean',
    'compass',
    'uglify',
    'copy:dist']);
  // Réalise le pré-processing CSS via Compass
  grunt.registerTask('css', ['compass']);
  // Réalise les tâches de développement
  grunt.registerTask('dev', ['watch']);
  // Réalise les screenshots
  grunt.registerTask('screenshots', ['casper:screenshots']);
};
