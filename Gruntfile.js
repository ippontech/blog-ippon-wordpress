
module.exports = function(grunt) {

  // Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    dist : 'dist',
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
    // Copie les fichiers
    copy: {
      dist: {
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
        }]
      }
    },
    // Réalise le pré-processing CSS via Compass
    compass: {
      dist:{
        options: {
          sassDir: 'styles',
          specify: 'styles/style.scss',
          cssDir: '<%= dist %>'
        }        
      }
    },
    // Prise en compte des fichiers modifiés
    watch: {
      copy: {
        files: ['views/**', 'js/**', 'img/**'],
        tasks: ['copy']
      },
      compass: {
        files: ['styles/{,*/}*.{scss,sass}'],
        tasks: ['compass']
        // ,
        // options: {
        //   livereload: true
        // }
      }
    }
  });

  // Plugin pour copier les fichiers
  grunt.loadNpmTasks('grunt-contrib-copy');
  // Plugin de pré-processing CSS via Compass
  grunt.loadNpmTasks('grunt-contrib-compass');
  // Plugin pour prendre en compte les modifications à chaud
  grunt.loadNpmTasks('grunt-contrib-watch');
  // grunt.loadNpmTasks('grunt-express');
  // grunt.loadNpmTasks('grunt-open');

  // Réalise le "live reload"
  // grunt.loadNpmTasks('grunt-livereload');


  // Creates the `server` task
  grunt.registerTask('server', [
    'express',
    'open',
    'express-keepalive'
  ]);
  // Réalise la distribution
  grunt.registerTask('build', ['copy']);
  // Réalise le pré-processing CSS via Compass
  grunt.registerTask('css', ['compass']);
  // Réalise les tâches de développement
  grunt.registerTask('dev', ['watch']);
};
