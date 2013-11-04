
module.exports = function(grunt) {

  // Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    dist : 'dist',
    // Copie les fichiers
    copy: {
      dist: {
        files: [{
          expand: true,
          cwd: 'views/',
          src: ['**'],
          dest: '<%= dist %>'
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
        files: ['views/**'],
        tasks: ['copy']
      },
      compass: {
        files: ['styles/{,*/}*.{scss,sass}'],
        tasks: ['compass']
      }
    }
  });

  // Plugin pour copier les fichiers
  grunt.loadNpmTasks('grunt-contrib-copy');
  // Plugin de pré-processing CSS via Compass
  grunt.loadNpmTasks('grunt-contrib-compass');
  // Plugin pour prendre en compte les modifications à chaud
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Réalise la distribution
  grunt.registerTask('build', ['copy']);
  // Réalise le pré-processing CSS via Compass
  grunt.registerTask('css', ['compass']);
  // Réalise les tâches de développement
  grunt.registerTask('dev', ['watch']);
};
