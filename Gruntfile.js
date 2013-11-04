
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
    }
  });

  // Plugin de pré-processing CSS via Compass
  grunt.loadNpmTasks('grunt-contrib-compass');

  // Réalise le pré-processing CSS via Compass
  grunt.registerTask('css', ['compass']);

};
