
module.exports = function(grunt) {

  // Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    tmp: '.tmp',
    dist: 'dist',
    hotdeploy: '<%= dist %>/theme-ippon',
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
        '<%= tmp %>', '<%= dist %>/**'
      ]
    },
    // réalise le pré-processing CSS via Compass
    compass: {
      dist:{
        options: {
          sassDir: 'styles',
          specify: 'styles/style.scss',
          cssDir: '<%= tmp %>',
          outputStyle: 'compressed'
        }        
      },
      dev:{
        options: {
          sassDir: 'styles',
          specify: 'styles/style.scss',
          cssDir: '<%= hotdeploy %>',
          outputStyle: 'expanded'
        }        
      }
    },
    // copie les fichiers
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
          cwd: 'js/vendor/',
          src: ['**'],
          dest: '<%= tmp %>/js/vendor'
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
          dest: '<%= hotdeploy %>'
        },
        {
          expand: true,
          cwd: 'js/',
          src: ['**'],
          dest: '<%= hotdeploy %>/js'
        },
        {
          expand: true,
          cwd: 'img/',
          src: ['**'],
          dest: '<%= hotdeploy %>/img'
        },
        {
          expand: true,
          cwd: 'img/',
          src: ['favicon_16x16.ico', 'favicon_32x32.png'],
          dest: '<%= hotdeploy %>'
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
          '<%= tmp %>/js/functions.js': [
          'js/functions.js'
          ]
        }
      }
    },
    // prise en compte (à chaud) des fichiers modifiés
    watch: {
      copy: {
        files: ['views/**', 'js/**', 'img/**'],
        tasks: ['copy:dev']
      },
      compass: {
        files: ['styles/**/*.{scss,sass}'],
        tasks: ['compass:dev']
        // ,
        // options: {
        //   livereload: true
        // }
      }
    },
    //
    zip: {
      theme: {
        cwd: '<%= tmp %>',
        src: ['<%= tmp %>/**'],
        dest: '<%= dist %>/theme-ippon-<%= pkg.version %>.zip'
      }


      // 'destinationZip': ['firstFileToZip', 'secondFileToZip', ...]
      // '<%= dist %>/theme-ippon-<%= pkg.version %>.zip': ['<%= tmp %>/img/*']


      // Specify working directory to zip from via `cwd`
      // 'more-widgets': {
      //   cwd: '<%= tmp %>/'
      //   // Files will zip to 'corkscrew.js' and 'sillyStraw.js'
      //   src: ['*'],
      //   dest: '<%= dist %>/theme-ippon-<%= pkg.version %>.zip'
      // }

    }
  });

  // grunt.loadTasks('tasks');

  // plugin de suppression de fichiers
  grunt.loadNpmTasks('grunt-contrib-clean');
  // plugin pour copier les fichiers
  grunt.loadNpmTasks('grunt-contrib-copy');
  // plugin de pré-processing CSS via Compass
  grunt.loadNpmTasks('grunt-contrib-compass');
  // plugin pour zipper des fichiers
  grunt.loadNpmTasks('grunt-zip');
  //
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // plugin pour prendre en compte les modifications à chaud
  grunt.loadNpmTasks('grunt-contrib-watch');
  // grunt.loadNpmTasks('grunt-express');
  // grunt.loadNpmTasks('grunt-open');

  // plugin pour lancer CasperJS
  grunt.loadNpmTasks('grunt-casper');


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
    'copy:dist',
    'zip']);
  // Réalise le pré-processing CSS via Compass
  grunt.registerTask('css', ['compass']);
  // Réalise les tâches de développement
  grunt.registerTask('dev', ['copy:dev', 'watch']);
  // Réalise les screenshots
  grunt.registerTask('screenshots', ['casper:screenshots']);
};
