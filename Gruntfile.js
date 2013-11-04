
module.exports = function(grunt) {

  // Configuration
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    dist : 'dist',
    compass: {
      dist:{
        options: {
          sassDir: 'styles',
          specify: 'styles/style.scss',
          cssDir: '<%= dist %>'
        }        
      }
    },
    watch: {
      compass: {
        files: ['styles/{,*/}*.{scss,sass}'],
        tasks: ['compass']
      }
    }
  });

  // Plugin de pré-processing CSS via Compass
  grunt.loadNpmTasks('grunt-contrib-compass');
  // Plugin pour prendre en compte les modifications à chaud
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Réalise le pré-processing CSS via Compass
  grunt.registerTask('css', ['compass']);
  // Réalise le pré-processing CSS via Compass
  grunt.registerTask('dev', ['watch']);
};
